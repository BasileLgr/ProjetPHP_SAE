<?php $title = "Détails de la Playlist"; ?>
<h1 class="my-4"><?php echo $title; ?></h1>

<?php if (empty($songs)): ?>
	<p>Cette playlist ne contient aucune chanson.</p>
<?php else: ?>
	<ul>
		<?php foreach ($songs as $song): ?>
			<li><?php echo $song['name']; ?> - Artiste: <?php echo $song['artist_name']; ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
