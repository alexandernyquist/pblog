<?php
Abstract Class DB Extends PDO
{
	private static $singleton;
	
	public static function singleton()
	{
		if(self::$singleton == null)
			self::$singleton = self::factory(Config::singleton()->get('database', 'type'));
			
		return self::$singleton;
	}
	
	public static function factory($dbtype)
	{
		switch($dbtype)
		{
			case 'mysql':
				return new Mysql;
				
			case 'sqllite':
				return new Sqllite;
				
			default:
				throw new Exception('This database is not yet supported by pBlog');
		}
	}
}

Class Mysql Extends DB
{
	public function __construct()
	{
		parent::__construct($this->getDns(),
							Config::singleton()->get('database', 'user'),
							Config::singleton()->get('database', 'password'));
	}
	
	public function getDns()
	{
		return 'mysql:host=' . Config::singleton()->get('database', 'host') . ';dbname=' . Config::singleton()->get('database', 'database');
	}
}

Class Sqllite Extends DB
{
	public function __construct()
	{
		parent::__construct($this->getDns());
	}
	
	public function getDns()
	{
		return 'sqlite:' . DB_SQLLITE_FILE;
	}
}
?>