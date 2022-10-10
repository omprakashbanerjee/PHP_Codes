<?php
require "includes/url.php";
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if($_POST['username']=='omprakash' && $_POST['password']=='helloworld')
	{
		session_regenerate_id(true);
		$_SESSION['is_logged_in']=true;
		redirect("accessing_database_with_php_html.php");
	}
	else $errors="login failed try again";
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<?php if(!empty($errors)): ?>
		<p><?=$errors ?></p>
	<?php endif;?>
	<h1>Please Login First</h1>
	<div>
		<form method="post">
			<label for="username">username</label><input type="text" name="username" id="username"><br>
			<label for="password">password</label><input type="password" name="password" id="password"><br>
			<button>login</button>
		</form>
	</div>

</body>
</html>