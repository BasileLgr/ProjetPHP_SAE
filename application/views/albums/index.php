<?php $title = $album['name']; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<div class="container mt-5">
	<h1 class="my-4"><?php echo $album['name']; ?></h1>
	<?php if (!empty($album['cover_image'])): ?>
		<img src="data:image/jpeg;base64,<?php echo base64_encode($album['cover_image']); ?>" class="img-fluid" alt="<?php echo $album['name']; ?>">
	<?php endif; ?>
	<p><strong>Année de sortie:</strong> <?php echo $album['year']; ?></p>
	<p><strong>Genre:</strong> <?php echo $album['genre_name']; ?></p>
	<p><strong>Artiste:</strong>
		<a href="<?php echo site_url('artists/view/' . $album['artistId']); ?>">
			<?php echo $album['artist_name']; ?>
		</a>
	</p>

	<h2 class="my-4">Liste des Chansons</h2>
	<?php if (!empty($songs)): ?>
		<ul class="list-group">
			<?php foreach ($songs as $song): ?>
				<li class="list-group-item"><?php echo $song['name']; ?></li>
			<?php endforeach; ?>
		</ul>
	<?php else: ?>
		<p>Aucune chanson trouvée pour cet album.</p>
	<?php endif; ?>
</div>

<?php $this->load->view('templates/footer'); ?>
