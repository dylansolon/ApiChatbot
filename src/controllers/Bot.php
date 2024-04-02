<?php

namespace App\Controllers;

class Bot {
    private $bots = array(
        1 => array(
            'id' => 1,
            'avatar' => 'http://localhost:81/bulbizarre.png',
            'name' => 'Bulbizarre'
        ),
        2 => array(
            'id' => 2,
            'avatar' => 'http://localhost:81/salameche.png',
            'name' => 'Salameche'
        ),
        3 => array(
            'id' => 3,
            'avatar' => 'http://localhost:81/carapuce.png',
            'name' => 'Carapuce'
        )
    );

    public function __construct($params) {
        $id = $params['id'];
        echo $this->displayBotInfo($this->getBot($id));
    }

    private function getBot($id) {
        return isset($this->bots[$id]) ? $this->bots[$id] : array("id" => $id, "avatar" => "/var/www/images/avatar_default.jpg", "name" => "Unknown Bot");
    }

    private function displayBotInfo($bot) {
        return json_encode($bot);
    }
}
