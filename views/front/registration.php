<form action="<?= site_url('wp-login.php?action=register', 'login_post') ?>" method="post" class="has-text-align-center background-animation">
    <h2>S'inscrire à la formation</h2>
    <input type="text" name="user_login" placeholder="Identifiant" id="user_login" style="margin:5px 0" />
    <input type="email" name="user_email" placeholder="Email" id="user_email" style="margin:5px 0" />
    <?php do_action('register_form'); ?>
    <input type="submit" value="Valider l'inscription" id="register" style="margin:5px 0" />
    <p><a href="<?= site_url('wp-login.php') ?>">J'ai déjà un compte</a></p>
</form>