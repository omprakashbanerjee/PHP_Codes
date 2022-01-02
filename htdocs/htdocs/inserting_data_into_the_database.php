<?php
require 'database_connection.php';
if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
	
	$conn=getDB();
	/*$sql="INSERT INTO articles (title,content,published_at)
	VALUES('".$_POST['title']."','".$_POST['content']."','".$_POST['published_at']."')";
*/
	$sql="INSERT INTO articles (title,content,published_at)
	VALUES(
	'".mysqli_escape_string($conn,$_POST['title'])."',
	'".mysqli_escape_string($conn,$_POST['content'])."',
	'".mysqli_escape_string($conn,$_POST['published_at'])."')";


	$results=mysqli_query($conn,$sql);

	if ($results===false)
	{
		echo mysqli_error($conn);
	}
	else
	{
		var_dump($sql);
		$id=mysqli_insert_id($conn);
		echo "inserted record with id=$id";
	}
	
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>inserting data into  the database </title>
</head>
<body>
	<h1>omblog database </h1>
	<form method="post">
		<div><label for="title">Title</label>
		<input type="text" id="title" name="title" placeholder="article title">
		</div>

		<div><label for="content">Content:</label>
		<textarea id="content" name="content" placeholder="article content"></textarea>
		</div>

		<div><label for="published_at">published_at</label>
		<input type="datetime-local" id="published_at" name="published_at">
		</div>

	<button>submit</button>
	</form>

</body>
</html>