<?php

/**
 * Plugin Name: Mooc 
 * Plugin URI: https://www.referencime.fr  
 * Description: Mooc
 * Version: 1
 * Author Name: Thomas Viennet (contact@referencime.fr)  
 * Author: Thomas Viennet (Référencime)  
 * Domain Path: /languages  
 * Text Domain: linky 
 * Author URI: https://www.referencime.fr/consultant-seo-freelance
 */

require_once('controllers/init.php');
require_once('controllers/quiz.php');
require_once('controllers/nav-mooc.php');
require_once('controllers/lesson.php');
require_once('controllers/mooc.php');
require_once('controllers/quiz-form.php');
require_once('controllers/quiz-question.php');
require_once('controllers/quiz-option.php');


use Mooc\Controllers\Init\Controller_Init;
use Mooc\Controllers\NavMooc\Controller_NavMooc; //to put in Mooc.php
use Mooc\Controllers\Mooc\Controller_Mooc;
use Mooc\Controllers\Quiz\Controller_Quiz;
use Mooc\Controllers\Lesson\Controller_Lesson;
use Mooc\Controllers\Controller_Form;
use Mooc\Controllers\Controller_Question;
use Mooc\Controllers\Controller_Option;

register_activation_hook(__FILE__, array(new Controller_Init(), 'createTables'));
add_action('init', array(new Controller_Init(), 'init')); //Contains the filters and actions hooks


//Shortcodes
add_shortcode('registration', 'registration');
function registration()
{
    if (!is_admin()) {
        if (!is_user_logged_in()) {
            ob_start();
            Controller_Mooc::displayRegistrationForm();
            return ob_get_clean();
        } else { //As this short code is only used on the presentation page of the course. A "continue training" button is displayed if the user is logged in
            return
                '<div class="is-content-justification-center is-layout-flex wp-container-2 wp-block-buttons">
            <div class="wp-block-button wp-block-button-important"><a class="wp-block-button__link has-background-color has-text-color has-background wp-element-button" href="/wp-admin/admin.php?page=dashboard">Continuer la formation</a></div>
            </div>';
        }
    }
}

add_shortcode('nav_mooc', 'navMooc');
function navMooc()
{
    if (!is_customize_preview()) {
        if (is_user_logged_in()) {
            ob_start();
            Controller_NavMooc::display();
            return ob_get_clean();
        }
    }
}

add_shortcode('lesson_button', 'lessonButton');
function lessonButton()
{
    if (!is_admin()) {
        if (is_user_logged_in()) {

            $user = wp_get_current_user();

            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'lesson_button') {

                    if ($_POST['lesson_status'] != "Completed") {
                        Controller_Lesson::saveLessonCompleted($user->ID, $_POST['lesson_slug']); //Use $_POST['lesson_slug'] instead of basename(get_permalink()) to move to next lesson after submitting the form.
                    } else {
                        Controller_Lesson::deleteLessonCompleted($user->ID, basename(get_permalink()));
                    }
                }
            }
            ob_start();
            Controller_Lesson::displayButton($user->ID, basename(get_permalink()));
            return ob_get_clean();
        }
    }
}

add_shortcode('mon_quiz', 'generate_quiz_shortcode');
function generate_quiz_shortcode($atts)
{
    $attributes = shortcode_atts(array(
        'form_name' => '', // Default value if no name is provided
    ), $atts);

    $formController = new Mooc\Controllers\Controller_Form();
    $questionController = new Mooc\Controllers\Controller_Question();
    $optionController = new Mooc\Controllers\Controller_Option();

    $form_id = $formController->model->getFormIdByName($attributes['form_name']);
    if (!$form_id) {
        return "Formulaire introuvable.";
    }

    $questions = $questionController->model->getQuestionsByFormId($form_id);
    $options = $optionController->model->getOptionsByFormId($form_id);

    $user_id = get_current_user_id();

    $nonce_field = wp_nonce_field('submit_quiz_' . $form_id, '_wpnonce', true, false);

    $quizHtml = "<form method='post' action='" . esc_url(admin_url('admin-post.php')) . "'>";
    $quizHtml .= "<input type='hidden' name='action' value='submit_quiz_answers'>";
    $quizHtml .= "<input type='hidden' name='user_id' value='" . esc_attr($user_id) . "'>";
    $quizHtml .= "<input type='hidden' name='form_id' value='" . esc_attr($form_id) . "'>";
    $quizHtml .= $nonce_field;

    foreach ($questions as $question) {
        $quizHtml .= "<div class='question'>" . esc_html($question->question_text) . "</div>";
        $quizHtml .= "<ul class='options'>";
        foreach ($options as $option) {
            if ($option->question_id == $question->id) {
                $quizHtml .= "<li><input type='radio' name='answer_" . esc_attr($question->id) . "' value='" . esc_attr($option->id) . "'>" . esc_html($option->option_text) . "</li>";
            }
        }
        $quizHtml .= "</ul>";
    }

    $quizHtml .= "<input type='submit' value='Soumettre'>";
    $quizHtml .= "</form>";

    return $quizHtml;
}

function handle_quiz_submission()
{
    if (isset($_POST['action']) && $_POST['action'] == 'submit_quiz_answers') {
        if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'submit_quiz_' . $_POST['form_id'])) {
            wp_die('La vérification de sécurité a échoué.');
        }

        $user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
        $form_id = isset($_POST['form_id']) ? intval($_POST['form_id']) : 0;
        $answers = [];

        foreach ($_POST as $key => $value) {
            if (strpos($key, 'answer_') === 0 && !empty($value)) {
                $answers[str_replace('answer_', '', $key)] = intval($value);
            }
        }

        global $wpdb;
        $table_name = $wpdb->prefix . 'mooc_quizzes_answers';

        $answers_serialized = maybe_serialize($answers);

        $data = array(
            'user_id' => $user_id,
            'form_id' => $form_id,
            'answers' => $answers_serialized
        );

        $format = array('%d', '%d', '%s'); 

        $wpdb->insert($table_name, $data, $format);

        $redirect_url = wp_get_referer();
        $redirect_url = $redirect_url ? $redirect_url : home_url();
        wp_redirect($redirect_url);
        exit;
    }
}
add_action('admin_post_submit_quiz_answers', 'handle_quiz_submission');
add_action('admin_post_nopriv_submit_quiz_answers', 'handle_quiz_submission');

//WIP
add_shortcode('quiz', 'quiz');
function quiz()
{
    if (!is_admin() && is_user_logged_in() && isset($_GET['quiz_name'])) {

        $user = wp_get_current_user();
        $quiz_id = 0; //Will be usefull when there will are a CRUD for quizzes

        if (isset($_GET['action']) && $_GET['action'] == 'submit') {

            //Need to check if the user has answered all the questions

            $answers = [
                $_POST['question1'],
                $_POST['question2'],
                $_POST['question3'],
                $_POST['question4'],
                $_POST['question5'],
                $_POST['question6'],
                $_POST['question7'],
                $_POST['question8'],
                $_POST['question9'],
                $_POST['question10']
            ];

            Controller_Quiz::saveAnswers($user->ID, $quiz_id, $_GET['quiz_name'], $answers);
        }
        ob_start();
        Controller_Quiz::viewQuiz($user->ID, $_GET['quiz_name']);
        return ob_get_clean();
    } else {
        Controller_Mooc::displayRegistrationForm();
    }
}
