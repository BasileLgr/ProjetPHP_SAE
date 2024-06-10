<?php $title = "Liste des Albums"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<h1>Liste des Albums</h1>
<ul>
	<?php foreach ($albums as $album): ?>
		<li><?php echo $album['name']; ?> (<?php echo $album['year']; ?>)</li>
	<?php endforeach; ?>
</ul>

<?php $this->load->view('templates/footer'); ?>
