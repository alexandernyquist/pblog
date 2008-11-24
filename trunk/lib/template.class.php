<?php
Class Template
{
	private $data;
	private $layout;
	
	private static $singleton;
	
	public function __construct($layout)
	{
		$this->data = array();
		$this->layout = $layout;
	}
	
	public static function singleton()
	{
		if(self::$singleton == null)
			self::$singleton = new self(SITE_LAYOUT);
			
		return self::$singleton;
	}
	
	public function get($key)
	{
		return $this->data[$key];
	}
	
	public function __set($key, $value)
	{
		$this->data[$key] = $value;
	}
	
	public function render(View $view)
	{
		$template = new View($this->layout);
		$template->content = $view->render();
		
		echo $template->render();
	}
}
?>