<?php

namespace Mooc\Controllers;

require_once(dirname(__FILE__) . '/../models/quiz-form.php');

use Mooc\Models\Model_Form;

class Controller_Form
{
    public $model;

    public function __construct()
    {
        $this->model = new Model_Form();
    }

    public function handleRequest()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            check_admin_referer('manage_form_action', 'manage_form_nonce');

            if (isset($_POST['action'])) {
                switch ($_POST['action']) {
                    case 'edit':
                        $this->updateForm($_POST['id'], $_POST);
                        break;
                    case 'add':
                        $this->addForm($_POST);
                        break;
                    case 'delete':
                        $this->deleteForm($_POST['id']);
                        break;
                }
            }
        }

        $this->displayAllForms();
    }

    public function displayAllForms()
    {
        $forms = $this->model->getAllForms();
        include dirname(__FILE__) . '/../views/quiz-form.php';
    }

    public function addForm($postData)
    {
        $formData = [
            'form_name' => sanitize_text_field($postData['form_name']),
        ];

        return $this->model->addForm($formData);
    }

    public function updateForm($form_id, $postData)
    {
        $formData = [
            'form_name' => sanitize_text_field($postData['form_name'])
        ];

        $this->model->updateForm($form_id, $formData);
    }

    public function deleteForm($form_id)
    {
        return $this->model->deleteForm($form_id);
    }
}
