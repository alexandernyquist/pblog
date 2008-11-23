<?php
error_reporting(E_ALL);
require_once '../init.php';

if(isset($_POST['user_add']))
{
	$user = new User;
	$user->user_name = $request->get('user_name');
	$user->user_email = $request->get('user_name');
	$user->user_password = $request->get('user_name');
	$user->user_nicename = $request->get('user_name');
	
	$um = new UserMapper;
	$um->insert($user);
}

if(isset($_POST['post_add']))
{
	$post = new Post;
	$post->post_title = $request->get('post_title');
	$post->post_body = $request->get('post_body');
	$post->post_created = date('Y-m-d H:i:s');
	$post->post_status = 'published';
	$post->post_permalink = $post->getPermalink($post->post_title);
	
	$pm = new PostMapper;
	$pm->insert($post);
}
?>
<html>
	<head>
	</head>
	<body>
		<h1>pBlog Administration</h1>
		<h2>Users</h2>
		<fieldset>
			<legend>Add user</legend>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<table>
					<tr>
						<th>Username</th>
						<td><input type="text" name="user_name" /></td>
					</tr>
					<tr>
						<th>Email</th>
						<td><input type="text" name="user_email" /></td>
					</tr>
					<tr>
						<th>Password</th>
						<td><input type="text" name="user_password" /></td>
					</tr>
					<tr>
						<th>Nicename</th>
						<td><input type="text" name="user_nicename" /></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="user_add" value="add" /></td>
					</tr>
				</table>
			</form>
		</fieldset>
		
		<h2>Posts</h2>
		<fieldset>
			<legend>Add post</legend>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<table>
					<tr>
						<th>Title</th>
						<td><input type="text" name="post_title" /></td>
					</tr>
					<tr>
						<th>Body</th>
						<td><textarea name="post_body"></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="post_add" value="add" /></td>
					</tr>
				</table>
			</form>
		</fieldset>
	</body>
</html>