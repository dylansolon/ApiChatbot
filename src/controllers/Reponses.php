<?php

namespace App\Controllers;

class Reponses {
    private $messages = array(
        1 => "Bonjour à tous.",
        2 => "Pierre est le leader de l'arène d'Argenta !",
        3 => "Ondine dirige l'arène d'Azuria.",
        4 => "Tu dois te rendre à Carmin sur Mer !"
    );

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
