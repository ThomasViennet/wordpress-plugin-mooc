<?php

/**
 * Plugin Name: Mooc 
 * Plugin URI: https://www.referencime.fr  
 * Description: Mooc
 * Version: 0.1
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

use Mooc\Controllers\NavMooc\Controller_NavMooc;//to put in Mooc.php
use Mooc\Controllers\Mooc\Controller_Mooc;
use Mooc\Controllers\Quiz\Controller_Quiz;
use Mooc\Controllers\Lesson\Controller_Lesson;

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
    if (!is_customize_preview()) {
        if (is_user_logged_in()) {

            $user = wp_get_current_user();

            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'lesson_button') {

                    if ($_POST['lesson_status'] != "Completed") {
                        Controller_Lesson::saveLessonCompleted($user->ID, basename(get_permalink()));
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
