<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="Content/Css/styleAdmin.css">
	 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	 <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
	<div id='content'>
		<?php foreach($posts as $post):?>
			<article class='post'>
				<h3><?= $post['title'] . ' le ' . $post['datefr'] ?></h3>
				<img src="Content/Images/<?= $post['image'] ?>">
				<p><?= $post['content'] ?></p>
				<a href="admin.php?delete=<?= $post['id'] ?>">Supprimer</a>
			</article>
		<?php endforeach; ?>
	</div>
</body>
</html>