<?php

namespace app\models;

use app\Database;

class Models
{
  private static $db = null;

  public static function table(string $table_name): Database
  {
    if (!self::$db) {
      $db = new Database();

      self::$db = $db->table($table_name);
    }

    return self::$db;
  }
}
