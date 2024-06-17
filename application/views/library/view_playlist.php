<?php $this->load->view('templates/header', ['title' => $title]); ?>

<div class="container mt-5">
	<h1>Détails de la Playlist</h1>

	<h2><?php echo $playlist['name']; ?></h2>
	<a href="<?php echo site_url('playlists/duplicate/' . $playlist['id']); ?>" class="btn btn-secondary">Dupliquer la Playlist</a>
	<h3>Chansons</h3>
	<?php if (!empty($songs)): ?>
		<ul>
			<?php foreach ($songs as $song): ?>
				<li>
					<?php echo $song['name']; ?> - Artiste: <?php echo $song['artist_name']; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php else: ?>
		<p>Aucune chanson trouvée.</p>
	<?php endif; ?>
</div>

<?php $this->load->view('templates/footer'); ?>
