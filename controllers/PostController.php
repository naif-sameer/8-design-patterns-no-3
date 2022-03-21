<?php

namespace app\controllers;

use app\models\Post;
use app\Router;

/**
 * Class Post controller
 * @package app\controllers
 */
class PostController
{
    public ?Post $db;

    public function __construct()
    {
        $this->db = new Post();
    }

    public function index(Router $router)
    {
        $router->render('index', []);
    }
}
