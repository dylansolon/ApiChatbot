<?php

require 'vendor/autoload.php';

use App\Router;
use App\Controllers\User;
use App\Controllers\Message;
// use App\Controllers\Messages;

new Router([
  'user/:id' => User::class,
  'message/:id' => Message::Class
  // 'messages' => Messages::Class
]);