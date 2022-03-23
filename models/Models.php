<?php

namespace app\models;

use app\Database;

class Models
{
  private static $db = null;

  public static function table(string $table_name): Database
  {
    if (!self::$db) {
      self::$db = new Database();
    }

    return self::$db->table($table_name);
  }
}
