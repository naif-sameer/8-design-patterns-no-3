<?php

namespace app\helpers;

class ValidateHelper
{
  /** check email
   * @param string $email
   * @return null|string null or error message
   */
  public static function checkEmail(string $email)
  {
    if (empty($email) && strlen($email) < 5) {
      return "Email must be validate";
    }
  }

  /** check Password
   * @param string $password
   * @return null|string null or error message
   */
  public static function checkPassword(string $password)
  {
    if (empty($password) && strlen($password) < 5) {
      return "Password must be validate";
    }
  }
}
