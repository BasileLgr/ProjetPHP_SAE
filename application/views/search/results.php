<?php $title = "Résultats de recherche pour \"" . htmlspecialchars($this->input->get('q')) . "\""; ?>
<h1 class="my-4"><?php echo $title; ?></h1>

<?php if (empty($albums) && empty($artists) && empty($songs)): ?>
	<p>Aucun résultat trouvé.</p>
<?php else: ?>

	<?php if (!empty($albums)): ?>
		<h2>Albums</h2>
		<div class="row">
			<?php foreach ($albums as $album): ?>
				<div class="col-md-4 mb-4">
					<div class="card">
						<?php if (!empty($album['cover_image'])): ?>
							<img src="data:image/jpeg;base64,<?php echo base64_encode($album['cover_image']); ?>" class="card-img-top" alt="<?php echo $album['name']; ?>">
						<?php endif; ?>
						<div class="card-body">
							<h5 class="card-title"><?php echo $album['name']; ?></h5>
							<p class="card-text">Année: <?php echo $album['year']; ?></p>
							<p class="card-text"><strong>Genre:</strong> <?php echo $album['genre_name']; ?></p>
							<p class="card-text"><strong>Artiste:</strong> <?php echo $album['artist_name']; ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<?php if (!empty($artists)): ?>
		<h2>Artistes</h2>
		<ul>
			<?php foreach ($artists as $artist): ?>
				<li><?php echo $artist['name']; ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if (!empty($songs)): ?>
		<h2>Chansons</h2>
		<ul>
			<?php foreach ($songs as $song): ?>
				<li><?php echo $song['name']; ?> - Album: <?php echo $song['album_name']; ?> - Artiste: <?php echo $song['artist_name']; ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

<?php endif; ?>
