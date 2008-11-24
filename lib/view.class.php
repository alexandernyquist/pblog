<?php
Class View
{
	private $data;
	private $file;
	
	public function __construct($file, $data = null)
	{
		$this->data = array();
		
		if($data !== null)
			$this->data = $data;
			
		$this->file = $file;
	}
	
	public function get($key)
	{
		return $this->data[$key];
	}
	
	public function __set($key, $value)
	{
		$this->data[$key] = $value;
	}
	
	public function render()
	{
		ob_start();
		
		extract($this->data);
		include $this->file;
		
		return ob_get_clean();
	}
}
?>