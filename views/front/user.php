<?php
if (!empty($alert)) {
    echo '<div  class="notice">' . $alert . '</div>';
}
?>
<?php if (isset($userData) && !empty($userData)) : ?>

    <div class="user-profile">
        <h2>Profil de l'utilisateur</h2>
        <p>Prénom : <?php echo esc_html($userData['prenom']); ?></p>
        <p>Nom : <?php echo esc_html($userData['nom']); ?></p>
        <p>Biographie : <?php echo esc_html($userData['bio']); ?></p>
        <p>Site Web : <a href="<?php echo esc_url($userData['site_web']); ?>" rel="ugc"><?php echo esc_html($userData['site_web']); ?></a></p>
    </div>

    <div class="user-certificate">
        <h2>Cours suivis</h2>
        <?php
        $hasPassed = $certificateController->hasUserPassed($user_id, 1); // '6' est l'ID du formulaire
        if ($hasPassed) :
        ?>
            <table>
                <tr>
                    <th>Cours</th>
                    <th>Certificat</th>
                </tr>
                <tr>
                    <td>Connaissances théoriques avancées en référencement naturel</td>
                    <td style="text-align: center;">
                        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                            <input type="hidden" name="action" value="generate_certificate">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <input type="hidden" name="form_id" value="1">
                            <?php wp_nonce_field('generate_certificate_nonce', 'certificate_nonce_field'); ?>
                            <input type="submit" value="Obtenir le certificat">
                        </form>
                    </td>
                </tr>
            </table>

        <?php else : ?>
            <p>Pas de certification.</p>
        <?php endif; ?>
    </div>
<?php else : ?>
    <p>Données de l'utilisateur non disponibles.</p>
<?php endif; ?>