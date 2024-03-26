<?php

namespace App;

class Router {
  protected array $routes;
  protected string $url;

  public function __construct(array $routes) {
    $this->routes = $routes;
    $this->url = $_SERVER['REQUEST_URI'];
    $this->run();
  }

  protected function extractParams($url, $rule) {
    $params = [];
    $urlParts = explode('/', trim($url, '/'));
    $ruleParts = explode('/', trim($rule, '/'));

    foreach ($ruleParts as $index => $rulePart) {
      if (strpos($rulePart, ':') === 0 && isset($urlParts[$index])) {
        $paramName = substr($rulePart, 1);
        $params[$paramName] = $urlParts[$index];
      }
    }

    return $params;
  }

  protected function matchRule($url, $rule) {
    $urlParts = explode('/', trim($url, '/'));
    $ruleParts = explode('/', trim($rule, '/'));

    if (count($urlParts) !== count($ruleParts)) {
      return false;
    }

    foreach ($ruleParts as $index => $rulePart) {
      if ($rulePart !== $urlParts[$index] && strpos($rulePart, ':') !== 0) {
        return false;
      }
    }

    return true;
  }

  protected function run() {
    $is404 = true;
    $url = parse_url($this->url, PHP_URL_PATH);

    foreach ($this->routes as $route => $controller) {
      if ($this->matchRule($url, $route)) {
        $params = $this->extractParams($url, $route);
        new $controller($params);

        $is404 = false;

        break;
      }
    }

    if ($is404) {
      header('Access-Control-Allow-Origin: *');
      header('Content-type: application/json; charset=utf-8');
      http_response_code(404);

      echo json_encode([
        'code' => '404',
        'message' => 'Not Found'
      ]);
    }
  }
}