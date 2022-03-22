<?php

namespace app\helpers;

class SessionHelper
{
  private static $auth = 'auth';
  private static $userID = 'userID';

  private function __construct()
  {
  }

  public static function run_session(): void
  {
    if (!isset($_SESSION)) {
      session_start();
    }
  }

  public static function get_auth()
  {
    return isset($_SESSION['auth']) ? $_SESSION['auth'] : null;
  }

  public static function set_auth()
  {
    return $_SESSION[self::$auth] = true;
  }

  public static function get_userID()
  {
    return $_SESSION[self::$userID];
  }

  /** set user id
   * @param string $userID
   */
  public static function set_userID(string $userID)
  {
    $_SESSION[self::$userID] = $userID;
  }

  public static function rest_session()
  {
    session_reset();
  }
}
