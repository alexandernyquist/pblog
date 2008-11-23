<?php

Class Post Extends Struct
{
	public function getPermalink($string)
	{
		$string = str_replace(' ', '-', $string);
		$string = str_replace(array('å', 'Å', 'ä', 'Ä'), 'a', $string);
		$string = str_replace(array('ö', 'Ö'), 'o', $string);
							  
		$string = preg_replace('~[^A-Za-z0-9-]~', '', $string);

		return strtolower($string);
	}
}

Class PostMapper Extends Mapper
{
	public function all($cond = null)
	{
		return parent::all('post', 'post', $cond);
	}
	
	public function get($cond = null)
	{
		return parent::get('post', 'post', $cond);
	}
	
	public function insert($object)
	{
		parent::insert('post', $object);
	}
}

?>