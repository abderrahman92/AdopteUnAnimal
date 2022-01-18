<?php

namespace Core;

use App;

class Table
{

  public static function getAll()
  {
    return self::query("SELECT * FROM " . static::$table . " ORDER BY id DESC");
  }

  public static function find($id)
  {
    $request = "SELECT * FROM " . static::$table . " WHERE id = ?";
    return self::query($request, [$id]);
  }

  public static function query($request, $attributes = null)
  {
    if ($attributes) {
      return App::getDb()->prepare($request, $attributes);
    } else {
      return App::getDb()->query($request);
    }
  }
}
