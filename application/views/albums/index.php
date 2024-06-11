<?php $title = "Liste des Albums"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<h1 class="my-4">Liste des Albums</h1>
<div class="row">
	<?php foreach ($albums as $album): ?>
		<div class="col-md-4 mb-4">
			<div class="card">
				<?php if ($album['cover_image']): ?>
					<img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($album['cover_image']); ?>" alt="<?php echo $album['name']; ?>">
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title"><?php echo $album['name']; ?></h5>
					<p class="card-text">Année de sortie : <?php echo $album['year']; ?></p>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<?php $this->load->view('templates/footer'); ?>
