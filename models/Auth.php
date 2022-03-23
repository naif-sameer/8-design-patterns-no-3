<?php

namespace app\models;

if (!isset($_SESSION)) {
  session_start();
}

use app\Database;
use app\helpers\UtilHelper;

/**
 * Auth
 * @package app\models
 */
class Auth extends Models
{

  public static function login($email, $password)
  {
    $user_data  = self::table('users')
      ->select("email", "usersID", "password")
      ->where('email', $email)
      ->and('password', $password)
      ->get();

    if ($user_data) {
      $_SESSION['auth'] = true;
      $_SESSION['userID'] = $user_data['usersID'];
      return true;
    }

    return false;

    // UtilHelper::log($isUser, $email, $password);
  }
}
