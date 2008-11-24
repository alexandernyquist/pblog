<?php
Class User Extends Struct
{

}

Class UserMapper Extends Mapper
{
	public function all()
	{
		return parent::all('users', 'User');
	}
	
	public function insert($object)
	{
		parent::insert('users', $object);
	}
}