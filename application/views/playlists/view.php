<?php $title = "Détails de la Playlist"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<div class="container mt-5">
	<h1><?php echo $playlist['name']; ?></h1>
	<a href="<?php echo site_url('playlists/duplicate/' . $playlist['id']); ?>" class="btn btn-secondary">Dupliquer la Playlist</a>
	<h2>Chansons</h2>
	<ul>
		<?php foreach ($songs as $song): ?>
			<li>
				<?php echo $song['name']; ?>
				<a href="<?php echo site_url('playlists/remove_song/' . $playlist['id'] . '/' . $song['id']); ?>" class="btn btn-danger btn-sm">Retirer</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<form action="<?php echo site_url('playlists/add_song'); ?>" method="post">
		<div class="form-group">
			<label for="song_id">Ajouter une chanson</label>
			<select class="form-control" id="song_id" name="song_id">
				<?php foreach ($this->Song_model->get_songs() as $song): ?>
					<option value="<?php echo $song['id']; ?>"><?php echo $song['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<input type="hidden" name="playlist_id" value="<?php echo $playlist['id']; ?>">
		<button type="submit" class="btn btn-primary">Ajouter</button>
	</form>
</div>

<?php $this->load->view('templates/footer'); ?>
