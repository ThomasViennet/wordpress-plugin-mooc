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

    public function displayAllQuestions()
    {
        // Récupérer les questions depuis le modèle
        $questions = $this->model->getAllQuestions();

        // Définir le chemin du fichier de vue
        $viewPath = dirname(__FILE__) . '/../views/quizv2.php';

        // S'assurer que le fichier existe
        if (file_exists($viewPath)) {
            include($viewPath);
        } else {
            return 'Vue non trouvée';
        }
    }

    // Ajouter une question avec options
    public function addQuestionWithOptions($questionData, $optionsData)
    {
        // Valider les données ici
        $question_id = $this->model->addQuestion($questionData);
        foreach ($optionsData as $option) {
            $option['question_id'] = $question_id;
            // Valider chaque option ici
            $this->model->addOption($option);
        }
    }

    // Mettre à jour une question
    public function updateQuestion($question_id, $data)
    {
        // Valider les données ici
        return $this->model->updateQuestion($question_id, $data);
    }

    // Mettre à jour une option
    public function updateOption($option_id, $data)
    {
        // Valider les données ici
        return $this->model->updateOption($option_id, $data);
    }

    // Supprimer une question
    public function deleteQuestion($question_id)
    {
        return $this->model->deleteQuestion($question_id);
    }

    // Supprimer une option
    public function deleteOption($option_id)
    {
        return $this->model->deleteOption($option_id);
    }

    // Autres méthodes pour gérer les opérations CRUD
    // ...
}
