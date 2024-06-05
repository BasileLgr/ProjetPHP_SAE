<!DOCTYPE html>
<html>
<head>
	<title>Liste des Albums</title>
</head>
<body>
<h1>Liste des Albums</h1>
<nav>
	<ul>
		<li><a href="<?php echo site_url('artists'); ?>">Artistes</a></li>
		<li><a href="<?php echo site_url('genres'); ?>">Genres</a></li>
		<li><a href="<?php echo site_url('songs'); ?>">Chansons</a></li>
	</ul>
</nav>
<ul>
	<?php foreach ($albums as $album): ?>
		<li><?php echo $album['name']; ?> (<?php echo $album['year']; ?>)</li>
	<?php endforeach; ?>
</ul>
</body>
</html>
