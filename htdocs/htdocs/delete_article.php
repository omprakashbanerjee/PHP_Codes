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
	$articles=getArticle($conn,$_GET['id'],'id');
	if($articles)
		{	$id=$articles['id'];
		}
	else { die("article not  found");}
	}

else { die("id not supplied, article not found"); }


if ($_SERVER["REQUEST_METHOD"]=="POST") 
{	
		$sql="DELETE FROM articles 
		WHERE id=?";
		$stmt=mysqli_prepare($conn,$sql);

		if ($stmt===false)
		{
			echo mysqli_error($conn);
		}
		else
		{
			mysqli_stmt_bind_param($stmt,'i',$id);
			if(mysqli_stmt_execute($stmt))
			{
			 
				redirect("accessing_database_with_php_html.php");
			}
			else
			{
				echo mysqli_stmt_error($stmt);
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>delete_data_from_database</title>
	<meta charset="utf-8">
</head>
<body>
	<h2>delete data ?</h2>
<form method="post">
	<button>delete</button>
	<a href="single_article.php?id=<?=$articles['id'];?>">cancel</a>
</form>
</body>
</html>