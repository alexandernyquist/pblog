<?php
error_reporting(E_ALL);
require_once 'init.php';

$pm = new PostMapper;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
		<title>Alexander Nyquist: Blog</title>
		<style type="text/css">
			h2 {
				margin: 0;
				padding: 0;
			}
			
			fieldset {
				border: 0px;
				background-color: #f2f2f2;
				border-top: 4px solid #5e5e5e;
				margin-bottom: 5px;
			}
			
			legend {
				margin: 0px;
				padding: 0px;
			}
			
			span.p {
				color: #5e5e5e;
			}
			
			#topright {
				position: absolute;
				top: 0px;
				right: 4px;
			}
			
			img {
				border: 0px;
			}
		</style>
	</head>
	
	<body>
	<h1><span class="p">p</span>Blog</h1>
	<?php
		if($request->get('p') != null)
		{
			$post = $request->get('p');
			if($post = $pm->get(array('post_permalink' => $post)))
			{
			?>
				<h4>
					<a href="/pblog">Tillbaka</a>
				</h4>
				
				<fieldset>
					<legend>
						<h2>
							<?php echo $post->post_title; ?> (<?php echo $post->post_created; ?>)
						</h2>
					</legend>
					
					<p>
						<?php echo $post->post_body; ?>
					</p>
				</fieldset>
			<?php
			}
			else
			{
			?>
				<p>Posten finns tyvärr inte. HEHeheh</p>
			<?php
			}
		}
		else
		{
			foreach($pm->all() as $post)
			{
			?>
				<fieldset>
						<h2>
							<a href="?p=<?php echo $post->post_permalink; ?>"><?php echo $post->post_title; ?></a> (<?php echo $post->post_created; ?>)
						</h2>
					
					<p>
						<?php echo $post->post_body; ?>
					</p>
				</fieldset>
			<?php
			}
		}
	?>
	
	<div id="topright">
		<p>
			<a href="http://validator.w3.org/check?uri=referer">
				<img src="http://www.w3.org/Icons/valid-xhtml10-blue" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
			</a>
		
			<a href="http://jigsaw.w3.org/css-validator/">
				<img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" />
			</a>
		</p>


	</div>
	</body>
</html>