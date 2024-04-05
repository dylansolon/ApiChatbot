<?php

namespace App\Controllers;

class Reponses {
    private $messages = hello();

    public function __construct($params) {
        $this->header();
        $id = $params['id'];
        echo $this->getMessage($id);
    }

  protected function header() {
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json; charset=utf-8');
  }

  protected function ifMethodExist() {
    $method = 'getReponseById';

    if (method_exists($this, $method)) {
      $response = $this->$method();

      if (is_array($response)) {

        echo json_encode($response);
      } else {

        echo $response;
      }
      return;
    }

    header('HTTP/1.0 404 Not Found');
    echo json_encode([
      'code' => '404',
      'message' => 'Not Found'
    ]);

    return;
  }

  protected function run() {
    $this->header();
    $this->ifMethodExist();
  }
}
