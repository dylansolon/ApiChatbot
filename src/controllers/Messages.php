<?php

namespace App\Controllers;

class Messages {
  protected array $params;
  protected string $reqMethod;

  public function __construct($params) {
    $this->params = $params;
    $this->reqMethod = strtolower($_SERVER['REQUEST_METHOD']);

    $this->run();
  }

  protected function run() {
    $this->header();
    $this->ifMethodExist();
  }

  protected function header() {
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json; charset=utf-8');
  }

  protected function ifMethodExist() {
    $method = $this->reqMethod.'Messages';

    if (method_exists($this, $method)) {
        echo json_encode($this->$method());
        return;
    }

    http_response_code(404);
    echo json_encode([
        'code' => '404',
        'message' => 'Not Found'
    ]);

    return;
}

public function getMessages() {
  // Réponses aux différents mots-clés
  $responses = [
      "bonjour" => "Bonjour à tous",
      "pierre" => "Pierre est le leader de l'arène d'Argenta !",
      "ondine" => "Ondine dirige l'arène d'Azuria.",
      "majorBob" => "Tu dois te rendre à Carmin sur Mer !"
  ];

  return $responses;
}

}
