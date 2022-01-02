<!-- this program is linked with database_connection.php program  and directly it wont show any data until we provide the id nmbr in the url -->
<?php
require 'database_connection.php';
$conn=getDB();
#require 'database_connection.php';
 if (isset($_GET['id']) && is_numeric($_GET['id'])) 
 {
	#here first we are checking if id value is set then if it is numeric or not
	#by doing this we can avoid displaying error msg on the screen as isset fn gives boolean value
	$sql="SELECT * 
	FROM articles
	WHERE id=".$_GET['id']; 
	$results= mysqli_query($conn,$sql);
	#var_dump($sql);
	if($results===false)//identical operator===
		{
			echo mysqli_error($conn);
		}
	else{
		$articles=mysqli_fetch_assoc($results);
		//var_dump($articles);
		}
}
else
$articles=null;
?>
<!DOCTYPE html>
<html>
<head>
	<title>accessing_single_data_in_database</title>
	<meta charset="utf-8">
</head>
<body>
	
	<header><p>please enter the id nmbr in  the url to see the data</p>
		<h1>my blog</h1>
	</header>
	<main>
		<?php if($articles===null):?>
			<p>no articles found.</p>
			<?php else: ?>
						<article>
								<h2><?=htmlspecialchars($articles['title']); ?></h2>
								<p><?=htmlspecialchars($articles['content']); ?></p>
							</article>
				<?php endif;?> 
	</main>	
</body>
</html>