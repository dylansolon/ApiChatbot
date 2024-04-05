<?php

namespace App\Controllers;

function hello() {
  return 'hello';
};

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

    private function getMessage($id) {
        return isset($this->messages[$id]) ? $this->messages[$id] : "Message introuvable.";
    }
}
