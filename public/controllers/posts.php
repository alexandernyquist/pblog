<?php

Class Posts Extends Controller
{
	public function index()
	{
		$pm = new PostMapper;
		
		$this->posts = $pm->all();
		$this->render('public/views/posts.php');
	}
	
	public function show($permalink)
	{
		$pm = new PostMapper;
		$this->post = $pm->get(array('post_permalink' => $permalink));
		
		$cm = new CommentsMapper;
		$this->comments = $cm->all($this->post->post_id);
		
		$this->render('public/views/post.php');
	}
}

?>