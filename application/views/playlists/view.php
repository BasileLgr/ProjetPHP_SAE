<?php $title = "Détails de la Playlist"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<div class="container mt-5">
	<h1><?php echo $title; ?></h1>

	<h2><?php echo $playlist['name']; ?></h2>
	<a href="<?php echo site_url('playlists/duplicate/' . $playlist['id']); ?>" class="btn btn-secondary">Dupliquer la Playlist</a>
	<h3>Chansons</h3>
	<?php if (!empty($songs)): ?>
		<ul>
			<?php foreach ($songs as $song): ?>
				<li>
					<?php echo $song['name']; ?> - Artiste: <?php echo isset($song['artist_name']) ? $song['artist_name'] : 'Inconnu'; ?>
					<a href="<?php echo site_url('playlists/remove_song/' . $playlist['id'] . '/' . $song['id']); ?>" class="btn btn-danger btn-sm">Retirer</a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php else: ?>
		<p>Aucune chanson trouvée.</p>
	<?php endif; ?>

	<!-- Formulaire pour ajouter des chansons aléatoires -->
	<form action="<?php echo site_url('playlists/add_random_songs/' . $playlist['id']); ?>" method="post">
		<div class="form-group">
			<label for="song_count">Nombre de chansons à ajouter:</label>
			<input type="number" class="form-control" id="song_count" name="song_count" min="1" required>
		</div>
		<button type="submit" class="btn btn-primary">Ajouter des chansons aléatoires</button>
	</form>
</div>

<?php $this->load->view('templates/footer'); ?>
