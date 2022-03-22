<?php

use app\controllers\AuthController;
use app\controllers\DashboardController;
use app\controllers\HomeController;
use app\Router;


require_once __DIR__ . '/../vendor/autoload.php';

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/post', [HomeController::class, 'show']);
$router->post('/post/delete', [HomeController::class, 'delete']);

$router->get('/post/add', [HomeController::class, 'addPage']);
$router->post('/post/add', [HomeController::class, 'add']);

$router->get('/post/edit', [HomeController::class, 'editPage']);
$router->post('/post/edit', [HomeController::class, 'edit']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);

$router->get('/dashboard', [DashboardController::class, 'index']);

$router->resolve();
