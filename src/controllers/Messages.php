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

  protected function getMessages() {
    $message = [
      'author' => 'Salamèche',
      'avatar' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.pokekalos.fr%2Fjeux%2Fswitch%2Fpokemonletsgopikachuevoli%2Fpokedex%2Fsalameche-4.html&psig=AOvVaw2bRQyS0HFw0GGUdNPPu7FG&ust=1711459370657000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCJiV8Y_Bj4UDFQAAAAAdAAAAABAE',
      'type' => 'bot',
      'date' => '25/3/2024',
      'text' => 'Vive Pokemon !'
    ];
    return [
      $message,
      $message,
      $message,
      $message
    ];
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
