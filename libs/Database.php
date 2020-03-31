<?php

namespace libs;

use PDO;

class Database
{
	// PDO object
	static private $dbh = null;

	public function __construct()
	{
		self::connect();
	}

	public static function connect($database = 'default')
	{
		if (class_exists('PDO') == TRUE)
		{
			$config = require 'configs/database.php';

			if (array_key_exists($database, $config))
            {
                $dsn = 'mysql:host='.$config[$database]['host'].';dbname='.$config[$database]['db'].';charset='.$config[$database]['charset'];
			
				$options = [
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				];

				self::$dbh = new PDO($dsn, $config[$database]['user'], $config[$database]['password'], $options);
				return true;
			} 
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	// Execute one query to the database with the return of the result of PDOStatement
	public static function query($stmt)
	{
		return self::$dbh->query($stmt);
	}

	public static function prepare($stmt)  
	{
		return self::$dbh->prepare($stmt);
	}

	static public function exec($query) 
	{
		return self::$db->exec($query);
	}
	 
	static public function lastInsertId()
	{
		return self::$db->lastInsertId();
	}

	public static function run($query, $args = [])  
	{
		try
		{
			if (!$args) 
			{
				return self::query($query);
			}

			$stmt = self::prepare($query);
			$stmt->execute($args);
			return $stmt;
		} 
		catch (PDOException $e) 
		{
			throw new Exception($e->getMessage());
		}
	}

	// Will return one record from the database (one, category, one post)
	public static function getRow($query, $args = [])
	{
		return self::run($query, $args)->fetch();
	}

	// Will return from the database all records (or several by condition)
	public static function getRows($query, $args = [])
	{
		return self::run($query, $args)->fetchAll();
	}

	// Will return one value from the database (category name)
	public static function getValue($query, $args = [])
	{
		$result = self::getRow($query, $args);

		if (!empty($result))
		{
			$result = array_shift($result);
		}

		return $result;
	}

	// Will return the values ​​of one column from the database (all category names)
	public static function getColumn($query, $args = [])
	{
		return self::run($query, $args)->fetchAll(PDO::FETCH_COLUMN);
	}

	// Custom request
	public static function sql($query, $args = [])
	{
		self::run($query, $args);
	}
}