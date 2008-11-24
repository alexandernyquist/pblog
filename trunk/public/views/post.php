<p>
	<a href="/pBlog">Back</a>
</p>
<fieldset>
	<h2>
		<a href="?controller=posts&action=show&params=<?php echo $post->post_permalink; ?>"><?php echo $post->post_title; ?></a>
	</h2>
	<p>
		<?php echo $post->post_body; ?>
	</p>
</fieldset>
<fieldset>
	<h2>Comments</h2>
	<?php foreach($comments as $comment): ?>
		<h4>
			<a href="mailto:<?php echo $comment->comment_email; ?>"><?php echo $comment->comment_name; ?></a>
		</h4>
		<p>
			<?php echo $comment->comment_body; ?>
		</p>
	<?php endforeach; ?>
</fieldset>