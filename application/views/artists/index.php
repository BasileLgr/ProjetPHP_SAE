<?php $title = "Artiste: " . $artist['name']; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<div class="container mt-5">
	<h1><?php echo $artist['name']; ?></h1>

	<h2>Albums</h2>
	<?php if (!empty($albums)): ?>
		<ul>
			<?php foreach ($albums as $album): ?>
				<li>
					<a href="<?php echo site_url('albums/view/' . $album['id']); ?>">
						<?php echo $album['name']; ?> (<?php echo $album['year']; ?>)
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
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
