<!DOCTYPE html>
<html>
<head>
	<title>Liste des Chansons</title>
</head>
<body>
<h1>Liste des Chansons</h1>
<nav>
	<ul>
		<li><a href="<?php echo site_url('albums'); ?>">Albums</a></li>
		<li><a href="<?php echo site_url('artists'); ?>">Artistes</a></li>
		<li><a href="<?php echo site_url('genres'); ?>">Genres</a></li>
	</ul>
</nav>
<ul>
	<?php foreach ($songs as $song): ?>
		<li><?php echo $song['name']; ?></li>
	<?php endforeach; ?>
</ul>
</body>
</html>
