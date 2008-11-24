<?php

Class Config
{
	private $data;
	
	private static $singleton;
	
	private function __construct($config)
	{
		$this->data = parse_ini_file($config, true);
	}
	
	public static function singleton()
	{
		if(self::$singleton == null)
			self::$singleton = new self(CONFIG_FILE);
			
		return self::$singleton;
	}
	
	public function get($section, $key)
	{
		return $this->data[$section][$key];
	}
}
?>