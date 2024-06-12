<?php $title = "Accueil"; ?>
<h1 class="my-4"><?php echo $title; ?></h1>

<h2>Artistes du moment</h2>
<div class="row">
	<?php foreach ($artists as $artist): ?>
		<div class="col-md-4 mb-4">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><?php echo $artist['name']; ?></h5>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<h2>Albums du moment</h2>
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
