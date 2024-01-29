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
        <h2>Certification</h2>
        <!-- Utilisation d'une boucle pour afficher tous les noms de formulaires -->
        Connaissances théoriques avancées en référencement naturel -  <a href="<?php echo esc_url(add_query_arg(['action' => 'generate_certificate', 'user_id' => $user_id, 'nonce' => wp_create_nonce('generate_certificate_nonce')])); ?>">
            Générer le certificat
        </a>
      
    </div>
<?php else : ?>
    <p>Données de l'utilisateur non disponibles.</p>
<?php endif; ?>