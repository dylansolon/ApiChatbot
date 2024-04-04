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

    protected function getBots() {
        $bots = [
            [
                'id' => 1,
                'name' => 'Bulbizarre',
                'avatar' => 'http://localhost:81/bulbizarre.png'
            ],
            [
                'id' => 2,
                'name' => 'Salamèche',
                'avatar' => 'http://localhost:81/salameche.png'
            ],
            [
                'id' => 3,
                'name' => 'Carapuce',
                'avatar' => 'http://localhost:81/carapuce.png'
            ]
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
            echo json_encode($this->$method());

            return;
        }

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
