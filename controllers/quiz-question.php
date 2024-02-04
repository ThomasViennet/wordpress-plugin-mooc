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
    private $model; //était public
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
        $forms = $this->formModel->getAllForms();
        include dirname(__FILE__) . '/../views/back/quiz-question.php';
    }

    public function addQuestion($postData)
    {
        $questionData = [
            'form_id' => intval($postData['form_id']),
            'question_text' => sanitize_text_field($postData['question_text']),
            'source_question' => sanitize_text_field($postData['source_question']),
        ];

        // return $this->model->addQuestion($questionData);
        $question_id = $this->model->addQuestion($questionData);

        if (isset($postData['options']) && is_array($postData['options'])) {

            foreach ($postData['options'] as $option) {
                if (is_array($option)) { // Assurez-vous que chaque $option est bien un tableau
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
        ];

        $this->model->updateQuestion(intval($question_id), $questionData);

        $this->optionModel->deleteOptionsByQuestionId(intval($question_id));

        if (isset($postData['options']) && is_array($postData['options'])) {
            foreach ($postData['options'] as $option) {
                if (is_array($option)) { // Assurez-vous que chaque $option est bien un tableau
                    $this->optionModel->addOption([
                        'question_id' => $question_id,
                        'option_text' => sanitize_text_field($option['option_text']),
                        'is_correct' => intval($option['is_correct']),
                    ]);
                } else {
                    echo 'pas un arr';
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
        if (!check_ajax_referer('manage_question_action', '_ajax_nonce', false)) {
            wp_send_json_error(['message' => 'Vérification de nonce échouée.']);
            return;
        }

        if (empty($_POST['question_text']) || empty($_POST['form_id']) || !isset($_POST['options'])) {
            wp_send_json_error(['message' => 'Des informations requises sont manquantes.']);
            return;
        }

        $form_id = intval($_POST['form_id']);
        $question_text = sanitize_text_field($_POST['question_text']);
        $options = isset($_POST['options']) ? $_POST['options'] : [];

        $question_data = [
            'form_id' => $form_id,
            'question_text' => $question_text,
            'source_question' => sanitize_text_field($_POST['source_question']),
        ];

        $question_id = $this->model->addQuestion($question_data);

        if (!$question_id) {
            wp_send_json_error(['message' => 'Impossible d\'ajouter la question.']);
            return;
        }

        foreach ($options as $option) {
            if (!empty($option['option_text'])) {
                $option_text = sanitize_text_field($option['option_text']);
                $is_correct = intval($option['is_correct']);
                
                $option_data = [
                    'question_id' => $question_id,
                    'option_text' => $option_text,
                    'is_correct' => $is_correct,//erreur null
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
