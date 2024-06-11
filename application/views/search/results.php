<?php $title = "Résultats de recherche"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<h1>Résultats de recherche pour "<?php echo htmlspecialchars($this->input->get('q')); ?>"</h1>

<h2>Albums</h2>
<ul>
	<?php foreach ($albums as $album): ?>
		<li><?php echo $album['name']; ?> (<?php echo $album['year']; ?>)</li>
	<?php endforeach; ?>
</ul>

<h2>Artistes</h2>
<ul>
	<?php foreach ($artists as $artist): ?>
		<li><?php echo $artist['name']; ?></li>
	<?php endforeach; ?>
</ul>

<h2>Genres</h2>
<ul>
	<?php foreach ($genres as $genre): ?>
		<li><?php echo $genre['name']; ?></li>
	<?php endforeach; ?>
</ul>

<h2>Chansons</h2>
<ul>
	<?php foreach ($songs as $song): ?>
		<li><?php echo $song['name']; ?></li>
	<?php endforeach; ?>
</ul>

<?php $this->load->view('templates/footer'); ?>
