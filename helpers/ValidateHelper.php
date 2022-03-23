<?php

namespace app\helpers;

function strStart($str, $param)
{
  $isStart = false;

  for ($i = 0; $i < strlen($str); $i++) {
    echo $str[$i];
    echo '--------';
  }
}
class ValidateHelper
{

  /** Error list
   */
  private static array $validation_errors = [];

  /** Email pattern
   */
  private static $emailPattern = '/[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+[.]+[a-z-A-Z]/';


  /** start with
   * @param string param 
   */
  private static function amountSeparator(string $param): array
  {
    return explode(":", $param);
  }

  /** validate
   * @param array param [$key => $value]
   * @return true|array true if validation successfully or error list
   * @example => validate(["name" => "required|min:30"])
   */
  public static function validate(array $request, array $validation_pattern)
  {
    foreach ($validation_pattern as $v_key => $v_value) {
      $patterns =  explode("|", $v_value);

      // required checking
      if (in_array('required', $patterns)) {
        self::required($request, $v_key);
      }

      // required checking
      if (in_array('email', $patterns)) {
        self::email($request, $v_key);
      }


      // min and max checking
      foreach ($patterns as $key) {

        // min value checking
        if (str_contains($key, 'min')) {
          $amountSeparator = explode(":", $key);
          self::min($request, $v_key, end($amountSeparator));
        }

        // max value checking
        if (str_contains($key, 'max')) {
          $amountSeparator = explode(":", $key);
          self::max($request, $v_key, end($amountSeparator));
        }
      }
    }

    return empty(self::$validation_errors)  ? true :   self::$validation_errors;
  }


  /** required  check if the request is set and not empty
   * @param array request
   * @param string key
   */
  private static function required(array $request, string $key)
  {
    $isKeySet = isset($request[$key]);
    $isValueEmpty = empty($request[$key]);

    if (!$isKeySet || $isValueEmpty) {
      self::$validation_errors[] = "$key is required";
    }
  }

  /** check request if it follow email pattern
   * @param array request
   * @param string key
   */
  private static function email(array $request, string $key)
  {
    $isKeySet = isset($request[$key]);

    if ($isKeySet) {
      if (!filter_var($request[$key], FILTER_VALIDATE_EMAIL)) {
        self::$validation_errors[] = "{$request[$key]} is not a valid email";
      }
    }
  }

  /** check min value length
   * @param array request
   * @param string key
   * @param string len
   */
  private static function min(array $request, string $key, string $len)
  {
    $isKeySet = isset($request[$key]);

    if ($isKeySet) {
      $isLower = strlen($request[$key]) < intval($len);

      if ($isLower) {
        self::$validation_errors[] = "$key is must be upper than $len";
      }
    }
  }

  /** check max value length
   * @param array request
   * @param string key
   * @param string len
   */
  private static function max(array $request, string $key, string $len)
  {
    $isKeySet = isset($request[$key]);

    if ($isKeySet) {
      $isUpper = strlen($request[$key]) > intval($len);

      if ($isUpper) {
        self::$validation_errors[] = "$key is must be lower than $len";
      }
    }
  }
}

// var_dump(
//   ValidateHelper::validate(
//     ["title" => "Hi there", 'name' => 'naif @gmail.com', "a" => 20],
//     ["title" => "required|min:3", "name" => "required|email", 'a' => 'required']
//   )
// );
