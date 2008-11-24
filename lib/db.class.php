<?php
Abstract Class DB Extends PDO
{
	private static $singleton;
	
	public static function singleton()
	{
		if(self::$singleton == null)
			self::$singleton = self::factory(DB_TYPE);
			
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
		parent::__construct($this->getDns(), DB_USER, DB_PASS);
	}
	
	public function getDns()
	{
		return 'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE;
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