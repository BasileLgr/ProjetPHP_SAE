<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="<?php echo site_url('home'); ?>">TuneTap</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('home'); ?>">Accueil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('albums'); ?>">Albums</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('artists'); ?>">Artistes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('genres'); ?>">Genres</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('songs'); ?>">Chansons</a>
			</li>
		</ul>
	</div>
</nav>
<div class="container">
