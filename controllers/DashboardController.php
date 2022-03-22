<?php

namespace app\controllers;

use app\helpers\SessionHelper;

SessionHelper::run_session();

use app\helpers\UtilHelper;
use app\models\Post;
use app\Router;

/**
 * Class Dashboard controller
 * @package app\controllers
 */
class DashboardController
{
  public function index(Router $router)
  {
    if (SessionHelper::get_auth()) {
      $data = Post::getPosts();

      // UtilHelper::log($data);

      $router->render('dashboard', $data);
    } else {
      Router::redirect("/login");
    }
  }
}
