<?php

/**
 * Соединяется с базой с помошью PDO
 */

namespace App\models;
use PDO;

class Connection
{
	public static function make($config){
		return new PDO("{$config['connection']}; dbname={$config['dbname']}; charset=utf8", $config['username'], $config['password']);
	}
}