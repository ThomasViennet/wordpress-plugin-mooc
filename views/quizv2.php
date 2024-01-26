<?php

// Shortcode pour afficher le formulaire d'ajout de question
function mooc_add_question_form_shortcode() {
    // Code HTML du formulaire avec nonce pour la sécurité
    $html = '<form action="" method="post">';
    $html .= wp_nonce_field('mooc_add_question_action', 'mooc_add_question_nonce');
    // Ajouter les champs du formulaire ici
    $html .= '<input type="text" name="question_text">';
    // Ajouter des champs pour les options
    $html .= '<input type="submit" name="mooc_add_question" value="Ajouter Question">';
    $html .= '</form>';

    return $html;
}
add_shortcode('mooc_add_question_form', 'mooc_add_question_form_shortcode');

// Traiter la soumission du formulaire
function mooc_handle_form_submission() {
    if (isset($_POST['mooc_add_question']) && check_admin_referer('mooc_add_question_action', 'mooc_add_question_nonce')) {
        // Récupérer, valider et nettoyer les données du formulaire
        // Appeler le contrôleur pour traiter les données
    }
}
add_action('init', 'mooc_handle_form_submission');
