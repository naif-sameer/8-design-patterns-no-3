<?php

namespace app\controllers;

use app\helpers\SessionHelper;

SessionHelper::run_session();

use app\helpers\UtilHelper;
use app\helpers\ValidateHelper;
use app\models\Auth;
use app\Router;

/**
 * Auth controller
 * @package app\controllers
 */
class AuthController
{
  public static $isLogin = false;

  public static function login()
  {
    Router::render('login');
  }

  public static function register()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $checkedEmail = ValidateHelper::checkEmail($email);
    $checkedPassword =  ValidateHelper::checkPassword($password);

    if (!$checkedEmail && !$checkedPassword) {
      // check if user is valid
      if (Auth::login($email, $password)) {
        Router::redirect("/dashboard");
      } else {
        Router::render('login', [
          "email" => $email,
          "password" => $password,
          "error" => "Email or password is wrong"
        ]);
      }
    }
  }

  public static function logout()
  {
    // SessionHelper::rest_session();
    session_destroy();

    Router::redirect('/login');
  }
}
