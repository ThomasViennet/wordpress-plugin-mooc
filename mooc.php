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
require_once('controllers/user.php');

use Mooc\Controllers\NavMooc\Controller_NavMooc;
use Mooc\Controllers\User\Controller_User;
use Mooc\Controllers\Quiz\Controller_Quiz;
use Mooc\Controllers\Lesson\Controller_Lesson;

register_activation_hook(__FILE__, array(new Controller_Init(), 'createTables'));//Create the tables in the database
add_action('init', array(new Controller_Init(), 'init'));//Contains the filters and actions hooks


//Shortcodes
add_shortcode('registration', 'registration');
function registration()
{
    if (!is_admin()) {
        if (!is_user_logged_in()) {
            (new Controller_User)->registration();
        }
    }
}

add_shortcode('nav_mooc', 'navMooc');
function navMooc()
{
    if (!is_admin()) {
        if (is_user_logged_in()) {
            (new Controller_NavMooc)->display();
        }
    }
}

add_shortcode('lesson_button', 'lessonButton');
function lessonButton()
{
    if (!is_admin()) {
        if (is_user_logged_in()) {

            $user = wp_get_current_user();
            $lesson = new Controller_Lesson;

            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'lesson_button') {

                    if ($_POST['lesson_status'] != "Completed") {
                        $lesson->saveLessonCompleted($user->ID, basename(get_permalink()));
                    } else {
                        $lesson->deleteLessonCompleted($user->ID, basename(get_permalink()));
                    }
                }
            }
            $lesson->displayButton($user->ID, basename(get_permalink()));
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

            (new Controller_Quiz())->saveAnswers($user->ID, $quiz_id, $_GET['quiz_name'], $answers);
        }
        (new Controller_Quiz())->viewQuiz($user->ID, $_GET['quiz_name']);
    } else {
        (new Controller_User)->registration();
    }
}
