<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
		body {
			padding-top: 70px; /* Ajustez cette valeur en fonction de la hauteur de votre navbar */
		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
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
				<a class="nav-link" href="<?php echo site_url('songs'); ?>">Chansons</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0" action="<?php echo site_url('search'); ?>" method="get">
			<input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search" name="q">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
		</form>
		<ul class="navbar-nav ml-auto">
			<?php if ($this->session->userdata('logged_in')): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('dashboard'); ?>"><?php echo $this->session->userdata('username'); ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('login/logout'); ?>">Se déconnecter</a>
				</li>
			<?php else: ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('login'); ?>">Se connecter</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('register'); ?>">S'inscrire</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</nav>
<div class="container">
