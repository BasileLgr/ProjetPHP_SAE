<?php $title = "Inscription"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<div class="row justify-content-center">
	<div class="col-md-6">
		<h2>Inscription</h2>
		<?php if (isset($error)): ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $error; ?>
			</div>
		<?php endif; ?>
		<?php if (isset($success)): ?>
			<div class="alert alert-success" role="alert">
				<?php echo $success; ?>
			</div>
		<?php endif; ?>
		<form action="<?php echo site_url('register/create_account'); ?>" method="post">
			<div class="form-group">
				<label for="pseudo">Pseudo</label>
				<input type="text" class="form-control" id="pseudo" name="pseudo" required>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" required>
			</div>
			<div class="form-group">
				<label for="password">Mot de passe</label>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>
			<button type="submit" class="btn btn-primary">Créer un compte</button>
		</form>
	</div>
</div>

<?php $this->load->view('templates/footer'); ?>
