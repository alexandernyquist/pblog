<?php

Abstract Class Controller
{
	private $data;

	public function __construct()
	{
		$this->data = array();
	}
	
	public function __get($key)
	{
		return $this->data[$key];
	}
	
	public function __set($key, $value)
	{
		$this->data[$key] = $value;
	}
	
	protected function render($file)
	{
		$view = new View($file, $this->data);
		
		$template = Template::singleton();		
		$template->render($view);
	}
	
	public function index()
	{
		throw new Exception('Index method not implemented');
	}
}

?>