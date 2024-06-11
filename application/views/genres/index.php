<?php $title = "Liste des Genres"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<h1 class="my-4">Liste des Genres</h1>
<div class="row">
	<?php foreach ($genres as $genre): ?>
		<div class="col-md-4 mb-4">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><?php echo $genre['name']; ?></h5>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<?php $this->load->view('templates/footer'); ?>
