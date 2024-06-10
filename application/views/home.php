<?php $title = "Accueil"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<div>
	<h1>Bienvenue sur notre site</h1>
	<p>Ceci est la page d'accueil de notre application.</p>
	<a href="<?php echo site_url('albums'); ?>">Voir les Albums</a>
	<br>
	<a href="<?php echo site_url('artists'); ?>">Voir les Artistes</a>
	<br>
	<a href="<?php echo site_url('genres'); ?>">Voir les Genres</a>
	<br>
	<a href="<?php echo site_url('songs'); ?>">Voir les Chansons</a>
</div>

<?php $this->load->view('templates/footer'); ?>
