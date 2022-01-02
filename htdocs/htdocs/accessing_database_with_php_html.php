<?php
#include 'database_connection.php';
require 'database_connection.php';
$conn=getDB();
#if we use require statement instead of include then if browser fails to find the require file then it stops the program
 #which doesnt happen with include statement
$sql="SELECT * 
FROM articles
ORDER BY id"; 
$results= mysqli_query($conn,$sql);
if($results===false)//identical operator===
	{
		echo mysqli_error($conn);
	}
else{
	$articles=mysqli_fetch_all($results, MYSQLI_ASSOC);
	//var_dump($articles);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>accessing database</title>
	<meta charset="utf-8">
</head>
<body>
	
	<header>
		<h1>my blog</h1>
	</header>
	<main>
		<a href="form_validation.php">New article</a>
		<?php if(empty($articles)):?>
			<p>no articles found.</p>
			<?php else:?>
					<ol>
						<?php foreach ($articles as  $value): ?> 
							<li>
							<article>
								<h2><a href="accessing_single_data.php?id=<?= $value['id']; ?>"><?=htmlspecialchars($value['title']); ?></a></h2>
								<p><?=htmlspecialchars($value['content']); ?></p>
							</article>
						</li>
					<?php endforeach;?>
					</ol>
				<?php endif;?> 
	</main>	
</body>
</html>