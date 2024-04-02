<?php

header("Access-Control-Allow-Origin: *");

require 'vendor/autoload.php';

use App\Router;
use App\Controllers\User;
use App\Controllers\Message;
use App\Controllers\Messages;
use App\Controllers\Reponses;
use App\Controllers\Bots;

new Router([
    'user/:id' => User::class,
    'message/:id' => Message::class,
    'messages' => Messages::class,
    'reponses/:id' => Reponses::class,
    'bots' => Bots::class
]);
