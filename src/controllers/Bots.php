<?php

namespace App\Controllers;

class Bots {
    protected array $params;
    protected string $reqMethod;

    public function __construct($params) {
        $this->params = $params;
        $this->reqMethod = strtolower($_SERVER['REQUEST_METHOD']);

        $this->run();
    }

    public function getBots() {
      $bots = [
          [
          'id' => 3,
          'name' => 'Salameche',
          'avatar' => 'http://localhost:81/salameche.png',
          'actions' => [
            [
                'words' => ['hello'],
                'response' => 'hello'
            ]
        ]
      ],
        [
        'id' => 4,
        'name' => 'Bulbizarre',
        'avatar' => 'http://localhost:81/bulbizarre.png',
        'actions' => [
          [
              'words' => ['hello'],
              'response' => 'hola'
          ]
      ]
    ],
        [
            'id' => 5,
            'name' => 'Carapuce',
            'avatar' => 'http://localhost:81/carapuce.png',
            'actions' => [
              [
                  'words' => ['hello'],
                  'response' => 'bonjour'
              ]
          ]
              ],
    ];
    
      
      return $bots;
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
