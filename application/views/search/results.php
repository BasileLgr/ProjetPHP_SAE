<?php $title = "Résultats de recherche pour \"" . htmlspecialchars($query, ENT_QUOTES, 'UTF-8') . "\""; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<h1>Résultats de recherche pour "<?php echo htmlspecialchars($query, ENT_QUOTES, 'UTF-8'); ?>"</h1>

<?php if (!empty($artists)): ?>
	<h2>Artistes</h2>
	<ul>
		<?php foreach ($artists as $artist): ?>
			<li>
				<a href="<?php echo site_url('artists/view/' . $artist['id']); ?>">
					<?php echo htmlspecialchars($artist['name'], ENT_QUOTES, 'UTF-8'); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<?php if (!empty($albums)): ?>
	<h2>Albums</h2>
	<div class="row">
		<?php foreach ($albums as $album): ?>
			<div class="col-md-4 mb-4">
				<div class="card">
					<?php if (!empty($album['cover_image'])): ?>
						<img src="data:image/jpeg;base64,<?php echo base64_encode($album['cover_image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($album['name'], ENT_QUOTES, 'UTF-8'); ?>">
					<?php endif; ?>
					<div class="card-body">
						<h5 class="card-title">
							<a href="<?php echo site_url('albums/view/' . $album['id']); ?>">
								<?php echo htmlspecialchars($album['name'], ENT_QUOTES, 'UTF-8'); ?>
							</a>
						</h5>
						<p class="card-text">Par <a href="<?php echo site_url('artists/view/' . $album['artistId']); ?>"><?php echo htmlspecialchars($album['artist_name'], ENT_QUOTES, 'UTF-8'); ?></a></p>
						<p class="card-text"><?php echo htmlspecialchars($album['year'], ENT_QUOTES, 'UTF-8'); ?></p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<?php if (!empty($songs)): ?>
	<h2>Chansons</h2>
	<ul>
		<?php foreach ($songs as $song): ?>
			<li>
				<?php echo htmlspecialchars($song['name'], ENT_QUOTES, 'UTF-8'); ?> par
				<a href="<?php echo site_url('artists/view/' . $song['artist_id']); ?>">
					<?php echo htmlspecialchars($song['artist_name'], ENT_QUOTES, 'UTF-8'); ?>
				</a> - Album:
				<a href="<?php echo site_url('albums/view/' . $song['album_id']); ?>">
					<?php echo htmlspecialchars($song['album_name'], ENT_QUOTES, 'UTF-8'); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<?php $this->load->view('templates/footer'); ?>
