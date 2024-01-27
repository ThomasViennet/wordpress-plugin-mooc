<?php

namespace Mooc\Controllers;

require_once(dirname(__FILE__) . '/../models/quiz-option.php');
require_once(dirname(__FILE__) . '/../models/quiz-question.php');

use Mooc\Models\Model_Option;
use Mooc\Models\Model_Question;


class Controller_Option
{
    public $model;
    private $questionModel;

    public function __construct()
    {
        $this->model = new Model_Option();
        $this->questionModel = new Model_Question();
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

    public function displayAllOptions()
    {
        $options = $this->model->getAllOptions();
        $questions = $this->questionModel->getAllQuestions();
        include dirname(__FILE__) . '/../views/quiz-option.php';
    }

    public function addOption($postData)
    {
        $optionData = [
            'question_id' => intval($postData['question_id']),
            'option_text' => sanitize_text_field($postData['option_text']),
            'is_correct' => intval($postData['is_correct']),
        ];

        return $this->model->addOption($optionData);
    }

    public function updateOption($option_id, $postData)
    {
        $optionData = [
            'question_id' => intval($postData['question_id']),
            'option_text' => sanitize_text_field($postData['option_text']),
            'is_correct' => intval($postData['is_correct']),
        ];

        $this->model->updateOption($option_id, $optionData);
    }

    public function deleteOption($option_id)
    {
        return $this->model->deleteOption($option_id);
    }
}
