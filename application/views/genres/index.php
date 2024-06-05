<!DOCTYPE html>
<html>
<head>
	<title>Liste des Genres</title>
</head>
<body>
<h1>Liste des Genres</h1>
<nav>
	<ul>
		<li><a href="<?php echo site_url('albums'); ?>">Albums</a></li>
		<li><a href="<?php echo site_url('artists'); ?>">Artistes</a></li>
		<li><a href="<?php echo site_url('songs'); ?>">Chansons</a></li>
	</ul>
</nav>
<ul>
	<?php foreach ($genres as $genre): ?>
		<li><?php echo $genre['name']; ?></li>
	<?php endforeach; ?>
</ul>
</body>
</html>
