<?php
/* we cant see the full sql  strinng which is executed as we  are using prepared statements, parameters are inserted into the sql at database server not in the php,
to see the sql strin gwe have to activate query log
*/
require 'database_connection.php';
if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
	$conn=getDB();

	$sql="INSERT INTO articles (title,content,published_at) VALUES (?,?,?)";
	$stmt=mysqli_prepare($conn,$sql);

	if ($stmt===false)
	{
		echo mysqli_error($conn);
	}
	else
	{//herenmbr of variables are 3 therefore we have given three s inside single quotes
		if ($_POST['published_at']=='') {
			$_POST['published_at']=NULL;
		}
		mysqli_stmt_bind_param($stmt,'sss',$_POST['title'],$_POST['content'],$_POST['published_at']);
		if(mysqli_stmt_execute($stmt))
		{
			$id=mysqli_insert_id($conn);
		echo "inserted record with id=$id";
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
	<title>inserting data into  the database </title>
</head>
<body>
	<h1>omblog database </h1>
	<h2>avoiding sql injection</h2>
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