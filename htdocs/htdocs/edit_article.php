<?php
require 'includes/database_connection.php';
require 'includes/getArticle.php';
require 'includes/url.php';

$conn=getDB();
session_start();

 if(!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']))
 	{
 		die("access denied");
	}

 if (isset($_GET['id']))
 {
	#here first we are checking if id value is set then as we are using prepare statement nolonger need to check id is numeric or not as prepare statement protect that from sql  injection
	#by doing this we can avoid displaying error msg on the screen as isset fn gives boolean value
	$articles=getArticle($conn,$_GET['id']);
	if($articles)
		{	$id=$articles['id'];
			$title=$articles['title'];
			$content=$articles['content'];
			$published_at=$articles['published_at'];
		}
	else { die("article not  found");}
	}

else { die("id not supplied, article not found"); }

if ($_SERVER["REQUEST_METHOD"]=="POST") 
{	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$published_at=$_POST['published_at'];

	$errors=validateForm($title,$content,$published_at);
	//var_dump($errors);exit;
	if (empty($errors)) 
	{

		$sql="UPDATE articles 
		SET title=?,
		content=?,
		published_at=?
		WHERE id=?";
		$stmt=mysqli_prepare($conn,$sql);

		if ($stmt===false)
		{
			echo mysqli_error($conn);
		}
		else
		{	if ($published_at=='') {
			$published_at=null;
		}
		//here nmbr of variables are 3 therefore we have given three s inside single quotes
			mysqli_stmt_bind_param($stmt,'sssi',$title,$content,$published_at,$id);
			if(mysqli_stmt_execute($stmt))
			{
			 
				redirect("single_article.php?id=$id");
				
			exit;
			}
			else
			{
				echo mysqli_stmt_error($stmt);
			}
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>edit Article </title>
</head>
<body>
	<p>edit Article</p>
	<?php require 'includes/new-article-form.php';?>
</body>
</html>