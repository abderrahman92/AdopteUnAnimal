<?php
namespace App;

use Core\Database;

class App
{

	private static $title = SITENAME;
	private static $database;

	public static function getDb()
	{
		if (self::$database === null) {
			self::$database = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST);
		}
		return self::$database;
	}

	public static function getTitle()
	{
		return self::$title;
	}

	public static function setTitle($title)
	{
		self::$title = $title . ' | ' . self::$title;
	}
}
