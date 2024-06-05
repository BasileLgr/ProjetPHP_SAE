<?php $title = "Liste des Artistes"; ?>
<?php $this->load->view('templates/navbar', ['title' => $title]); ?>

<h1>Liste des Artistes</h1>
<ul>
	<?php foreach ($artists as $artist): ?>
		<li><?php echo $artist['name']; ?></li>
	<?php endforeach; ?>
</ul>

<?php $this->load->view('templates/footer'); ?>
