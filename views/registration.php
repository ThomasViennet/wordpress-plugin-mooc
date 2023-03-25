<?php
    $title = "Inscription";
    // $skillsAssessed = 'Connaissances générales sur le SEO';
?>

<?php ob_start(); ?>

<form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
    <input type="text" name="user_login" placeholder="Identifiant" id="user_login" style="margin:5px 0"/>
    <input type="email" name="user_email" placeholder="Email" id="user_email" style="margin:5px 0"/>
    <?php do_action('register_form'); ?>
    <input type="submit" value="S'inscrire à la formation" id="register" style="margin:5px 0"/>
    <p><a href="wp-login.php">J'ai déjà un compte</a></p>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>