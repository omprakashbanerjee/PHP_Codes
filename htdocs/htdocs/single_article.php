<!-- this program is linked with database_connection.php program  and directly it wont show any data until we provide the id nmbr in the url -->
<?php
require 'includes/database_connection.php';
require 'includes/getArticle.php';
$conn=getDB();

 if (isset($_GET['id']))
 {
	#here first we are checking if id value is set then as we are using prepare statement nolonger need to check id is numeric or not as prepare statement protect that from sql  injection
	#by doing this we can avoid displaying error msg on the screen as isset fn gives boolean value
	$articles=getArticle($conn,$_GET['id']);
}
else
$articles=null;
?>
<!DOCTYPE html>
<html>
<head>
	<title>single_data_in_database</title>
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
							<a href="edit_article.php?id=<?=$articles['id'];?>">edit</a>
							<a href="delete_article.php?id=<?=$articles['id'];?>">delete</a>
				<?php endif;?> 
	</main>	
</body>
</html>