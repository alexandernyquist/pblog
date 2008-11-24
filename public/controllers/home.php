<?php

Class Home Extends Controller
{
	public function index()
	{
		$pm = new PostMapper;
		
		$this->posts = $pm->all();
		$this->render('public/views/posts.php');
	}
}

?>