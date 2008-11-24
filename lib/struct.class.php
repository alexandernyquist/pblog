<?php
/*
Class Struct
Simple placeholder for unknown objects
*/

Class Struct
{
	private $data;

	public function __get($key)
	{
		return $this->data[$key];
	}
	
	public function __set($key, $value)
	{
		$this->data[$key] = $value;
	}
	
	public function getData()
	{
		return $this->data;
	}
}
?>