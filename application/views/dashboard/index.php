<?php $title = "Tableau de Bord"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<div class="row">
	<div class="col-md-12">
		<h1>Bienvenue sur votre tableau de bord</h1>
		<p>Vous êtes connecté.</p>
		<a href="<?php echo site_url('logout'); ?>" class="btn btn-primary">Déconnexion</a>
	</div>
</div>

<?php $this->load->view('templates/footer'); ?>
