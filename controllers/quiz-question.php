<?php

namespace Mooc\Controllers;

require_once(dirname(__FILE__) . '/../models/quiz-form.php');
require_once(dirname(__FILE__) . '/../models/quiz-question.php');
require_once(dirname(__FILE__) . '/../models/quiz-option.php');


use Mooc\Models\Model_Form;
use Mooc\Models\Model_Question;
use Mooc\Models\Model_Option;

class Controller_Question
{
    private $model;
    private $formModel;
    private $optionModel;

    public function __construct()
    {
        $this->model = new Model_Question();
        $this->formModel = new Model_Form();
        $this->optionModel = new Model_Option();
        add_action('wp_ajax_add_question_with_options', array($this, 'handleAjaxAddQuestionWithOptions'));
    }

    public function handleRequest()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            check_admin_referer('manage_question_action', 'manage_question_nonce');

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
                    default:
                        break;
                }
            }
        }

        $this->displayAllQuestions();
    }

    public function displayAllQuestions()
    {
        $questions = $this->model->getAllQuestions();

        foreach ($questions as $question) {
            $options = $this->optionModel->getOptions($question->id);
            $question->options = $options;
        }

        $forms = $this->formModel->getAllForms();
        include dirname(__FILE__) . '/../views/back/quiz-question.php';
    }

    public function addQuestion($postData)
    {
        $questionData = [
            'form_id' => intval($postData['form_id']),
            'question_text' => sanitize_text_field($postData['question_text']),
            'source_question' => sanitize_text_field($postData['source_question']),
            'always_include' => isset($postData['always_include']) ? 1 : 0,
        ];

        $question_id = $this->model->addQuestion($questionData);

        if (isset($postData['options']) && is_array($postData['options'])) {

            foreach ($postData['options'] as $option) {
                if (is_array($option)) {
                    $this->optionModel->addOption([
                        'question_id' => $question_id,
                        'option_text' => sanitize_text_field($option['option_text']),
                        'is_correct' => intval($option['is_correct']),
                    ]);
                }
            }
        }
    }

    public function updateQuestion($question_id, $postData)
    {
        $questionData = [
            'form_id' => intval($postData['form_id']),
            'question_text' => sanitize_text_field($postData['question_text']),
            'source_question' => sanitize_text_field($postData['source_question']),
            'always_include' => isset($postData['always_include']) ? 1 : 0,
        ];

        // Mise à jour de la question
        $this->model->updateQuestion(intval($question_id), $questionData);

        // Suppression des options existantes pour la question
        $this->optionModel->deleteOptionsByQuestionId(intval($question_id));

        // Ajout des nouvelles options fournies dans la requête
        if (isset($postData['options']) && is_array($postData['options'])) {
            foreach ($postData['options'] as $option) {
                if (!empty($option['option_text'])) { // Assurez-vous que l'option contient du texte
                    $option_text = sanitize_text_field($option['option_text']);
                    $is_correct = isset($option['is_correct']) ? intval($option['is_correct']) : 0;

                    // Ajout de la nouvelle option
                    $this->optionModel->addOption([
                        'question_id' => $question_id,
                        'option_text' => $option_text,
                        'is_correct' => $is_correct,
                    ]);
                }
            }
        }
    }


    public function deleteQuestion($question_id)
    {
        return $this->model->deleteQuestion($question_id);
    }

    public function handleAjaxAddQuestionWithOptions()
    {
        // error_log(print_r($_POST, true));

        if (!check_ajax_referer('manage_question_action', '_ajax_nonce', false)) {
            wp_send_json_error(['message' => 'Vérification de nonce échouée.']);
            return;
        }

        if (empty($_POST['question_text']) || empty($_POST['form_id'])) {
            wp_send_json_error(['message' => 'Des informations requises sont manquantes.']);
            return;
        }

        $form_id = intval($_POST['form_id']);
        $question_text = sanitize_text_field($_POST['question_text']);
        $options = isset($_POST['options']) ? $_POST['options'] : [];
        $always_include = isset($_POST['always_include']) ? 1 : 0;

        $question_data = [
            'form_id' => $form_id,
            'question_text' => $question_text,
            'source_question' => sanitize_text_field($_POST['source_question']),
            'always_include' => $always_include,
        ];

        $question_id = $this->model->addQuestion($question_data);

        if (!$question_id) {
            wp_send_json_error(['message' => 'Impossible d\'ajouter la question.']);
            return;
        }

        foreach ($options as $option) {
            if (!empty($option['option_text'])) {
                $option_text = sanitize_text_field($option['option_text']);
                $is_correct = isset($option['is_correct']) ? intval($option['is_correct']) : 0;

                $option_data = [
                    'question_id' => $question_id,
                    'option_text' => $option_text,
                    'is_correct' => $is_correct,
                ];

                $option_id = $this->optionModel->addOption($option_data);

                if (!$option_id) {
                    wp_send_json_error(['message' => 'Erreur lors de l\'ajout']);
                }
            }
        }
        wp_send_json_success(['message' => 'Question ajoutée']);
    }
}
