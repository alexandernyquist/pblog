<?php foreach($posts as $post): ?>
	<fieldset>
		<h2>
			<a href="?controller=posts&action=show&params=<?php echo $post->post_permalink; ?>">
				<?php echo $post->post_title; ?>
			</a>
			(<?php echo $post->post_created; ?>)
		</h2>
		<p>
			<?php echo $post->post_body; ?>
		</p>
	</fieldset>
<?php endforeach; ?>