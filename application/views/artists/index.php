<?php $title = "Artiste: " . $artist['name']; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<div class="container mt-5">
	<h1><?php echo $artist['name']; ?></h1>

	<h2>Albums</h2>
	<?php if (!empty($albums)): ?>
		<div class="row">
			<?php foreach ($albums as $album): ?>
				<div class="col-md-4 mb-4">
					<div class="card">
						<?php if (!empty($album['cover_image'])): ?>
							<img src="data:image/jpeg;base64,<?php echo base64_encode($album['cover_image']); ?>" class="card-img-top" alt="<?php echo $album['name']; ?>">
						<?php endif; ?>
						<div class="card-body">
							<h5 class="card-title">
								<a href="<?php echo site_url('albums/view/' . $album['id']); ?>">
									<?php echo $album['name']; ?> (<?php echo $album['year']; ?>)
								</a>
							</h5>
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
				<li><?php echo $song['name']; ?></li>
			<?php endforeach; ?>
		</ul>
	<?php else: ?>
		<p>Aucune chanson trouvée.</p>
	<?php endif; ?>
</div>

<?php $this->load->view('templates/footer'); ?>
