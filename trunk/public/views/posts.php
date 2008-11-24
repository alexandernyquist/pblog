<h1>Posts</h1>
<ul>
	<?php foreach($posts as $post): ?>
		<h2><?php echo $post->post_title; ?></h2>
	<?php endforeach; ?>
</ul>