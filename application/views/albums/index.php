<?php $title = "Liste des Albums"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<h1 class="my-4">Liste des Albums</h1>
<div class="row">
	<?php foreach ($albums as $album): ?>
		<div class="col-md-4 mb-4">
			<div class="card">
				<?php if (!empty($album['cover_image'])): ?>
					<img src="data:image/jpeg;base64,<?php echo base64_encode($album['cover_image']); ?>" class="card-img-top" alt="<?php echo $album['name']; ?>">
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title"><?php echo $album['name']; ?></h5>
					<p class="card-text"><?php echo $album['year']; ?></p>
					<p class="card-text"><strong>Genre:</strong> <?php echo $album['genre_name']; ?></p>
					<p class="card-text"><strong>Artiste:</strong> <?php echo $album['artist_name']; ?></p>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<?php $this->load->view('templates/footer'); ?>
