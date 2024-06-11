<?php $title = "Résultats de recherche"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<h1>Résultats de recherche pour "<?php echo htmlspecialchars($this->input->get('q')); ?>"</h1>

<h2>Albums</h2>
<?php if (!empty($albums)): ?>
	<div class="row">
		<?php foreach ($albums as $album): ?>
			<div class="col-md-4">
				<div class="card mb-4 shadow-sm">
					<?php if (!empty($album['cover_image'])): ?>
						<img src="data:image/jpeg;base64,<?php echo base64_encode($album['cover_image']); ?>" class="card-img-top" alt="<?php echo $album['name']; ?>">
					<?php endif; ?>
					<div class="card-body">
						<h5 class="card-title"><?php echo $album['name']; ?></h5>
						<p class="card-text"><?php echo $album['year']; ?></p>
						<p class="card-text"><strong>Genre:</strong> <?php echo $album['genre_name']; ?></p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php else: ?>
	<p>Aucun album trouvé.</p>
<?php endif; ?>

<h2>Chansons</h2>
<?php if (!empty($songs)): ?>
	<ul>
		<?php foreach ($songs as $song): ?>
			<li><?php echo $song['name']; ?> - <strong>Genre:</strong> <?php echo $song['genre_name']; ?></li>
		<?php endforeach; ?>
	</ul>
<?php else: ?>
	<p>Aucune chanson trouvée.</p>
<?php endif; ?>

<h2>Artistes</h2>
<?php if (!empty($artists)): ?>
	<ul>
		<?php foreach ($artists as $artist): ?>
			<li><?php echo $artist['name']; ?></li>
		<?php endforeach; ?>
	</ul>
<?php else: ?>
	<p>Aucun artiste trouvé.</p>
<?php endif; ?>

<?php $this->load->view('templates/footer'); ?>
