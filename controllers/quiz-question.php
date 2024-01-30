<?php

namespace Mooc\Controllers;

require_once(dirname(__FILE__) . '/../models/quiz-question.php');
require_once(dirname(__FILE__) . '/../models/quiz-form.php');

use Mooc\Models\Model_Form;
use Mooc\Models\Model_Question;

class Controller_Question
{

    public $model;
    private $formModel;

    public function __construct()
    {
        $this->model = new Model_Question();
        $this->formModel = new Model_Form();
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
        ];

        return $this->model->addQuestion($questionData);
    }

    public function updateQuestion($question_id, $postData)
    {
        $questionData = [
            'form_id' => intval($postData['form_id']),
            'question_text' => sanitize_text_field($postData['question_text'])
        ];

        $this->model->updateQuestion($question_id, $questionData);
    }

    public function deleteQuestion($question_id)
    {
        return $this->model->deleteQuestion($question_id);
    }
}
