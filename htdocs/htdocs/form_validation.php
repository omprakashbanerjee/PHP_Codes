<?php
/* we cant see the full sql  strinng which is executed as we  are using prepared statements, parameters are inserted into the sql at database server not in the php,
to see the sql strin gwe have to activate query log
*/
require 'database_connection.php';
$errors=[];
$title='';
$content='';
$published_at='';
if ($_SERVER["REQUEST_METHOD"]=="POST") 
{	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$published_at=$_POST['published_at'];

	if ($title=='') 
	{
		$errors[]='title required';
	}
	if ($content=='') 
	{
		$errors[]='content required';
	}
	if ($published_at!='') {
		$date_time=date_create_from_format('Y/m/d G:i:s',$published_at);
		if ($date_time===false) {
			$errors[]='invalid date and time';
		}
		else{
			$date_errors=date_get_last_errors();
			if($date_errors['warning_count']>0){
					$errors[]='invalid date and time';
			}
		}
	}

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
		//here nmbr of variables are 3 therefore we have given three s inside single quotes
			mysqli_stmt_bind_param($stmt,'sss',$title,$content,$published_at);
			if(mysqli_stmt_execute($stmt))
			{
				$id=mysqli_insert_id($conn);
			// 	if (isset($_SERVER['HTTPS'])&& $_SERVER['HTTPS'] !='off') {
			// 		$protocol='https';
			// 	}
			// 	else{
			// 		$protocol='http';
			// 	}
			// header("Location: $protocol://". $_SERVER['HTTP_HOST'] ."accessing_single_data.php?id=$id");
				header("Location: accessing_single_data.php?id=$id");
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
	<title>form validation </title>
</head>
<body>
	<p>New Article</p>
	<?php if (!empty($errors)):?>
		<ul><?php foreach ($errors as $error):?>
		<li><?= $error ?></li>
		<?php endforeach;?>
		</ul>
	<?php endif;?>
	<h1>omblog database </h1>
	<form method="post">
		<div><label for="title">Title</label>
		<input type="text" id="title" name="title" placeholder="article title" value="<?=htmlspecialchars($title); ?>">
		</div>

		<div><label for="content">Content:</label>
		<textarea id="content" name="content" placeholder="article content"><?=htmlspecialchars($content); ?></textarea>
		</div>

		<div><label for="published_at">published_at</label>
		<input type="datetime-local" id="published_at" name="published_at" value="<?= htmlspecialchars($published_at); ?>">
		</div>

	<button>submit</button>
	</form>

</body>
</html>