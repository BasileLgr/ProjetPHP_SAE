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
		<ul class="navbar-nav mr-auto">
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
		<form class="form-inline my-2 my-lg-0" action="<?php echo site_url('search'); ?>" method="get">
			<input class="form-control mr-sm-2" type="search" name="q" placeholder="Rechercher" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
		</form>
		<ul class="navbar-nav ml-auto">
			<?php if ($this->session->userdata('user_id')): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('login/logout'); ?>">Déconnexion</a>
				</li>
			<?php else: ?>
				<li class="nav-item">
					<a class="nav-link btn btn-primary text-white" href="<?php echo site_url('login'); ?>">Connexion</a>
				</li>
				<li class="nav-item">
					<a class="nav-link btn btn-secondary text-white ml-2" href="<?php echo site_url('register'); ?>">Inscription</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</nav>
<div class="container">
