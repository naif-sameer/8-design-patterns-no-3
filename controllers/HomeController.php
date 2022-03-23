<?php

namespace app\controllers;

use app\helpers\UtilHelper;
use app\Router;

/**
 * Class Post controller
 * @package app\controllers
 */
class HomeController
{
    public function index()
    {
        Router::render('index');
    }
}
