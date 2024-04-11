<?php

namespace App\Controllers;

use App\Models\BotsModel;

class Bots {
    protected array $params;
    protected string $reqMethod;

    public function __construct($params) {
        $this->params = $params;
        $this->reqMethod = strtolower($_SERVER['REQUEST_METHOD']);
        $this->model = new BotsModel();

        $this->run();
    }

    public function getBots() {
      return $this->model->getAllBots();
       }

    protected function header() {
        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json; charset=utf-8');
    }

    protected function ifMethodExist() {
      $method = $this->reqMethod.'Bots';
  
      if (method_exists($this, $method)) {
        header('HTTP/1.0 200 OK');
        echo json_encode($this->$method());
  
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
