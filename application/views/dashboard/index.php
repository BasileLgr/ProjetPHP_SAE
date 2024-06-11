<?php $title = "Tableau de bord utilisateur"; ?>
<?php $this->load->view('templates/header', ['title' => $title]); ?>

<h1 class="my-4">Bonjour, <?php echo $user['Pseudo']; ?></h1>
<p>Email: <?php echo $user['Email']; ?></p>
<a href="<?php echo site_url('dashboard/update_profile'); ?>" class="btn btn-primary">Mettre à jour le profil</a>
<a href="<?php echo site_url('dashboard/change_password'); ?>" class="btn btn-secondary">Changer le mot de passe</a>
<a href="<?php echo site_url('dashboard/delete_account'); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.');">Supprimer le compte</a>

<?php $this->load->view('templates/footer'); ?>
