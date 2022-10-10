<?php
/* we cant see the full sql  strinng which is executed as we  are using prepared statements, parameters are inserted into the sql at database server not in the php,
to see the sql string we have to activate query log
*/
require 'includes/database_connection.php';
require 'includes/getArticle.php';
require 'includes/url.php';
$errors=[];
$title='';
$content='';
$published_at='';
session_start();

 if(!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']))
 	{
 		die("access denied");
	}

if ($_SERVER["REQUEST_METHOD"]=="POST") 
{	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$published_at=$_POST['published_at'];

	$errors=validateForm($title,$content,$published_at);
	//var_dump($errors);exit;
	if (empty($errors)) 
	{
		$conn=getDB();

		$sql="INSERT INTO articles (title,content,published_at) VALUES (?,?,?)";
		$stmt=mysqli_prepare($conn,$sql);

		if ($stmt===false)
		{
			echo mysqli_error($conn);
		}
		else
		{	if ($published_at=='') {
			$published_at=null;
		}
		//here nmbr of variables are 3 and are string type therefore we have given three s inside single quotes
			mysqli_stmt_bind_param($stmt,'sss',$title,$content,$published_at);
			if(mysqli_stmt_execute($stmt))
			{
				$id=mysqli_insert_id($conn);

			redirect("single_article.php?id=$id");
			
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
	<title>New Article </title>
</head>
<body>
	<p>New Article</p>
	<?php require 'includes/new-article-form.php';?>
</body>
</html>