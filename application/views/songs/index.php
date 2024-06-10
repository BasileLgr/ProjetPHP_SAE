<?php $title = "Liste des Chansons"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<h1>Liste des Chansons</h1>
<ul>
	<?php foreach ($songs as $song): ?>
		<li><?php echo $song['name']; ?></li>
	<?php endforeach; ?>
</ul>

<?php $this->load->view('templates/footer'); ?>
