<!DOCTYPE html>
<html>
<head>
	<title>Liste des Artistes</title>
</head>
<body>
<h1>Liste des Artistes</h1>
<nav>
	<ul>
		<li><a href="<?php echo site_url('albums'); ?>">Albums</a></li>
		<li><a href="<?php echo site_url('genres'); ?>">Genres</a></li>
		<li><a href="<?php echo site_url('songs'); ?>">Chansons</a></li>
	</ul>
</nav>
<ul>
	<?php foreach ($artists as $artist): ?>
		<li><?php echo $artist['name']; ?></li>
	<?php endforeach; ?>
</ul>
</body>
</html>
