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
require_once('controllers/quiz-question.php');
require_once('controllers/nav-mooc.php');
require_once('controllers/lesson.php');
require_once('controllers/mooc.php');
require_once('controllers/user.php');

use Mooc\Controllers\Controller_Init;
use Mooc\Controllers\Controller_User;
use Mooc\Controllers\Controller_NavMooc; //to put in Mooc.php
use Mooc\Controllers\Controller_Mooc;
use Mooc\Controllers\Controller_Quiz;
use Mooc\Controllers\Controller_Question;
use Mooc\Controllers\Controller_Lesson;

register_activation_hook(__FILE__, array(new Controller_Init(), 'createTables'));
add_action('init', array(new Controller_Init(), 'init')); //Contains filters actions and shortcodes

// Merge shortcodes into controllers/init.php
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
            return '
            <div class="is-content-justification-center is-layout-flex wp-container-2 wp-block-buttons">
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

add_shortcode('user_profile', 'displayUserProfile');
function displayUserProfile()
{
    if (!empty($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $userProfileController = new Controller_User();
        ob_start();
        $userProfileController->displayUserProfile($user_id);
        return ob_get_clean();
    }
}


//WIP
add_shortcode('quizOld', 'quiz');
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

add_action('wp_ajax_add_question_with_options', array(new Controller_Question(), 'handleAjaxAddQuestionWithOptions'));
add_action('wp_ajax_nopriv_add_question_with_options', array(new Controller_Question(), 'handleAjaxAddQuestionWithOptions')); // Utilisez cette ligne si vous voulez que l'action soit accessible aux utilisateurs non connectés



