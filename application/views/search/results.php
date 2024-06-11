<?php $title = "Résultats de recherche"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<h1>Résultats de recherche pour "<?php echo htmlspecialchars($this->input->get('q')); ?>"</h1>

<?php if (!empty($albums)): ?>
	<h2>Albums</h2>
	<ul>
		<?php foreach ($albums as $album): ?>
			<li><?php echo $album['name']; ?> par <?php echo $album['artist_name']; ?> (<?php echo $album['year']; ?>)</li>
		<?php endforeach; ?>
	</ul>
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
			<li><?php echo $song['name']; ?> par <?php echo $song['artist_name']; ?> (Genre: <?php echo $song['genre_name']; ?>)</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<?php $this->load->view('templates/footer'); ?>
