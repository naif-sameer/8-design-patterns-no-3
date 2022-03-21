<?php

use app\controllers\PostController;
use app\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$router = new Router();

$router->get('/', [PostController::class, 'index']);
$router->get('/posts', [PostController::class, 'posts']);
$router->get('/categories', [PostController::class, 'categories']);

$router->resolve();
