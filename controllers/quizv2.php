<?php

namespace Mooc\Controllers;

require_once(dirname(__FILE__) . '/../models/quizv2.php');

use Mooc\Models\QuizModel;

class QuizController
{
    private $model;

    public function __construct()
    {
        $this->model = new QuizModel();
    }

    // Gérer les requêtes POST et afficher les questions
    public function handleRequest()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            check_admin_referer('manage_quiz_action', 'manage_quiz_nonce');

            if (isset($_POST['action'])) {
                switch ($_POST['action']) {
                    case 'edit':
                        $this->updateQuestion($_POST['id'], $_POST);
                        break;
                    case 'add':
                        $this->addQuestion($_POST);
                        break;
                    case 'delete':
                        $this->deleteQuestion($_POST['id']);
                        break;
                }
            }
        }

        $this->displayAllQuestions();
    }

    // Afficher toutes les questions
    public function displayAllQuestions()
    {
        $questions = $this->model->getAllQuestions();
        include dirname(__FILE__) . '/../views/quizv2.php'; // Assurez-vous que le chemin est correct
    }

    // Ajouter une nouvelle question
    public function addQuestion($postData)
    {
        // Ici, vous devriez valider et nettoyer $postData
        $questionData = [
            'quiz_id' => intval($postData['quiz_id']), // Assurez-vous que 'quiz_id' est envoyé depuis le formulaire
            'user_id' => get_current_user_id(), // Obtient l'ID de l'utilisateur actuellement connecté
            'question_text' => sanitize_text_field($postData['question_text']),
            'status_update_date' => current_time('mysql') // Utilisez la date et l'heure actuelles
        ];

        // Appel au modèle pour insérer les données
        return $this->model->addQuestion($questionData);
    }

    // Mettre à jour une question
    public function updateQuestion($question_id, $postData)
    {
        $questionData = [
            'question_text' => sanitize_text_field($postData['question_text'])
        ];

        $this->model->updateQuestion($question_id, $questionData);
    }

    // Supprimer une question
    public function deleteQuestion($question_id)
    {
        return $this->model->deleteQuestion($question_id);
    }

    // Vous pouvez ajouter d'autres méthodes si nécessaire
}
