<?php

Class Comment Extends Struct
{

}

Class CommentsMapper Extends Mapper
{
	public function all($postID)
	{
		return parent::all('comment', 'comment', array('post_id' => $postID));
	}
	
	public function insert($object)
	{
		parent::insert('comment', $object);
	}
}

?>