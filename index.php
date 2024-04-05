<?php

require 'vendor/autoload.php';

use App\Router;
use App\Controllers\User;
use App\Controllers\Bot;
use App\Controllers\Bots;
use App\Controllers\Messages;
use App\Controllers\Reponses;

new Router([
    'user/:id' => User::class,
    'bot/:id' => Bot::class,
    'bots' => Bots::class,
    'messages' => Messages::class,
    'reponses/:id' => Reponses::class

]);
