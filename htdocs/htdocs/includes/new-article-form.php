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

	<button>save</button>
	</form>
