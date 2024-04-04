<?php

// header("Access-Control-Allow-Origin: *");

require 'vendor/autoload.php';

use App\Router;
use App\Controllers\User;
use App\Controllers\Reponses;
use App\Controllers\Bot;
use App\Controllers\Bots;
use App\Controllers\Messages;

new Router([
    'user/:id' => User::class,
    'reponses/:id' => Reponses::class,
    'bot/:id' => Bot::class,
    'bots' => Bots::class,
    'messages' => Messages::class
]);
