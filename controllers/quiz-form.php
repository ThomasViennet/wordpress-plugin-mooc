<?php

namespace Mooc\Controllers;

require_once(dirname(__FILE__) . '/../models/quiz-form.php');
require_once(dirname(__FILE__) . '/../models/quiz-question.php');
require_once(dirname(__FILE__) . '/../models/quiz-option.php');
require_once(dirname(__FILE__) . '/../models/quiz-answer.php');
require_once(dirname(__FILE__) . '/../controllers/quiz-certificate.php'); //transform into services in /lib

use Mooc\Models\Model_Form;
use Mooc\Models\Model_Question;
use Mooc\Models\Model_Option;
use Mooc\Models\Model_Answer;

class Controller_Form
{
    private $formModel;
    private $questionModel;
    private $optionModel;
    private $answerModel;
    private $certificateController;

    public function __construct(Model_Form $formModel, Model_Question $questionModel, Model_Option $optionModel, Model_Answer $answerModel)
    {
        $this->formModel = $formModel;
        $this->questionModel = $questionModel;
        $this->optionModel = $optionModel;
        $this->answerModel = $answerModel;
        $this->certificateController = new Controller_Certificate();
    }


    //START BO
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
        $forms = $this->formModel->getAllForms();
        include dirname(__FILE__) . '/../views/back/quiz-form.php';
    }

    public function addForm($postData)
    {
        $formData = [
            'form_name' => sanitize_text_field($postData['form_name']),
        ];

        return $this->formModel->addForm($formData);
    }

    public function updateForm($form_id, $postData)
    {
        $formData = [
            'form_name' => sanitize_text_field($postData['form_name'])
        ];

        $this->formModel->updateForm($form_id, $formData);
    }

    public function deleteForm($form_id)
    {
        return $this->formModel->deleteForm($form_id);
    }
    //END - BO

    //START - FRONT
    public function displayQuiz($atts)
    {
        if (!is_user_logged_in()) {
            require_once(dirname(__FILE__) . '/../views/front/certification-presentation.php');
            // require_once(dirname(__FILE__) . '/../views/front/registration.php');
        } else {
            $attributes = shortcode_atts(['form_name' => ''], $atts);
            $form_name = $attributes['form_name'];

            $user_id = get_current_user_id();
            $form_id = $this->formModel->getFormIdByName($form_name);

            if (!$form_id) {
                return "Formulaire introuvable.";
            }

            if ($this->checkFormSubmission($user_id, $form_id)) {
                if ($this->certificateController->evaluateUserAnswers($user_id, $form_id)) {
                    include(dirname(__FILE__) . '/../views/front/certificate-congratulations.php');
                } else {
                    echo 'Vous n\'avez pas obtenu au moins 80% de bonnes réponses.';
                    echo "<form method='post' action='" . esc_url(admin_url('admin-post.php')) . "'>";
                    echo "<input type='hidden' name='action' value='reset_quiz_answers'>";
                    echo "<input type='hidden' name='user_id' value='" . esc_attr($user_id) . "'>";
                    echo "<input type='hidden' name='form_id' value='" . esc_attr($form_id) . "'>";
                    echo "<input type='submit' value='Recommencer'>";
                    echo "</form>";
                }
            } else {
                $questions = $this->questionModel->getQuestionsByFormId($form_id);
                $options = $this->optionModel->getOptionsByFormId($form_id);
                return $this->prepareQuizHtml($questions, $options, $form_id);
            }
        }
    }

    public function prepareQuizHtml($questions, $options, $form_id)
    {
        $quizHtml = "<form method='post' action='" . esc_url(admin_url('admin-post.php')) . "'>";
        $quizHtml .= "<input type='hidden' name='action' value='submit_quiz_answers'>";
        $quizHtml .= "<input type='hidden' name='form_id' value='" . esc_attr($form_id) . "'>";
        $quizHtml .= wp_nonce_field('submit_quiz_' . $form_id, '_wpnonce', true, false);

        foreach ($questions as $question) {
            $quizHtml .= '<h4>' . esc_html($question->question_text) . '</h4>';
            foreach ($options as $option) {
                if ($option->question_id == $question->id) {
                    $quizHtml .= '<label><input type="checkbox" name="answer_' . esc_attr($question->id) . '[]" value="' . esc_attr($option->id) . '">' . esc_html($option->option_text) . '</label><br>';
                    //lorsqu'un utilisateur choisi plusieurs case à cocher ça n'enregistre pas tous les coix
                }
            }
        }

        $quizHtml .= "<input type='submit' value='Soumettre'>";
        $quizHtml .= "</form>";

        return $quizHtml;
    }

    public function handleQuizSubmission()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'submit_quiz_answers') {
            echo 'lol';
            if (!wp_verify_nonce($_POST['_wpnonce'], 'submit_quiz_' . $_POST['form_id'])) {
                wp_die('La vérification de sécurité a échoué.');
            }

            $form_id = isset($_POST['form_id']) ? intval($_POST['form_id']) : null;
            $user_id = get_current_user_id();
            $answers = [];

            foreach ($_POST as $key => $value) {
                if (strpos($key, 'answer_') === 0 && is_array($value)) {
                    $question_id = str_replace('answer_', '', $key);
                    foreach ($value as $answer_id) {
                        $answer_id = intval($answer_id);
                        $answers[$question_id][] = $answer_id;
                    }
                }
            }

            $this->answerModel->saveAnswers($user_id, $form_id, $answers);

            $redirect_url = wp_get_referer();
            $redirect_url = $redirect_url ? $redirect_url : home_url();
            wp_redirect($redirect_url);
            exit;
        }
    }

    public function checkFormSubmission($user_id, $form_id)
    {
        $userAnswers = $this->answerModel->getUserFormAnswers($user_id, $form_id);
        return $userAnswers !== false;
    }

    public function resetUserAnswers()
    {
        if (isset($_POST['user_id'], $_POST['form_id'])) {
            $user_id = intval($_POST['user_id']);
            $form_id = intval($_POST['form_id']);

            $this->answerModel->deleteUserFormAnswers($user_id, $form_id);

            $redirect_url = wp_get_referer();
            $redirect_url = $redirect_url ? $redirect_url : home_url();
            wp_redirect($redirect_url);
            exit;
        } else {
            wp_die('Données manquantes pour réinitialiser les réponses du quiz.');
        }
    }
    //END - FRONT
}
