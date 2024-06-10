<?php $title = "Liste des Genres"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<h1>Liste des Genres</h1>
<ul>
	<?php foreach ($genres as $genre): ?>
		<li><?php echo $genre['name']; ?></li>
	<?php endforeach; ?>
</ul>

<?php $this->load->view('templates/footer'); ?>
