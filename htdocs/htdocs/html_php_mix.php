<?php
$time=20;
$articles=[
			[ "title"=>"first post",
  			  "content"=>"this is first post"
			],
			[ "title"=>"second post",
			"content"=>"this is second post"
			],
]
?>
<!DOCTYPE html>
<html>
<head>
	<title>html php mix</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>HTML PHP MIXING <?php echo "program"; ?></h1>
	<!-- above we can see that header is mixed with html and php -->
	<?php if ($time<10): ?>
		Good Morning
	<?php elseif ($time<15) :?>
		Good Afternoon
		<?php elseif ($time<22) :?>
		<a>Good Evening</a>
	<?php else: ?>
		Good Night
	<?php endif ;?>
	<p>hello <?="OM";?></p>
	<!-- <? this is short opening tag of php 
	?> this short closing tag,  by using this we can remove eco statement -->
	</p>
	<header>
		<h1>my blog</h1>
	</header>
	<main>
		<ol>
			<?php foreach ($articles as  $value): ?> <li>
				<article>
					<h2><?=$value['title']; ?></h2>
					<p><?=$value['content']; ?></p>
				</article>
			</li>
		<?php endforeach;?>
		</ol>
	</main>	
</body>
</html>