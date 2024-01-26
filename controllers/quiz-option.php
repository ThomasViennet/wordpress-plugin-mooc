<?php

namespace Mooc\Controllers;

require_once(dirname(__FILE__) . '/../models/quiz-option.php');

use Mooc\Models\Model_Option;

class Controller_Option
{
    private $model;

    public function __construct()
    {
        $this->model = new Model_Option();
    }

    // Gérer les requêtes POST et afficher les options
    public function handleRequest()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            check_admin_referer('manage_option_action', 'manage_option_nonce');

            if (isset($_POST['action'])) {
                switch ($_POST['action']) {
                    case 'edit':
                        $this->updateOption($_POST['id'], $_POST);
                        break;
                    case 'add':
                        $this->addOption($_POST);
                        break;
                    case 'delete':
                        $this->deleteOption($_POST['id']);
                        break;
                }
            }
        }

        $this->displayAllOptions();
    }

    // Afficher toutes les options
    public function displayAllOptions()
    {
        $options = $this->model->getAllOptions();
        include dirname(__FILE__) . '/../views/quiz-option.php'; // Assurez-vous que le chemin est correct
    }

    // Ajouter une nouvelle option
    public function addOption($postData)
    {
        // Ici, vous devriez valider et nettoyer $postData
        $optionData = [
            'question_id' => intval($postData['question_id']), // Assurez-vous que 'quiz_id' est envoyé depuis le formulaire
            'option_text' => sanitize_text_field($postData['option_text']),
        ];

        // Appel au modèle pour insérer les données
        return $this->model->addOption($optionData);
    }

    public function updateOption($option_id, $postData)
    {
        $optionData = [
            'option_text' => sanitize_text_field($postData['option_text'])
        ];

        $this->model->updateOption($option_id, $optionData);
    }

    public function deleteOption($option_id)
    {
        return $this->model->deleteOption($option_id);
    }

    // Vous pouvez ajouter d'autres méthodes si nécessaire
}
