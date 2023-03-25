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
require_once('controllers/save-answers.php');
require_once('controllers/dashboard.php');
require_once('controllers/view-quiz.php');
require_once('controllers/registration.php');
require_once('controllers/nav-mooc.php');
require_once('controllers/button-lesson.php');

use Mooc\Controllers\Initialisation\Controllers_Init;
use Mooc\Controllers\SaveAnswers\SaveAnswers;
use Mooc\Controllers\ViewQuiz\ViewQuiz;
use Mooc\Controllers\Registration\Registration;
use Mooc\Controllers\Dashboard\Dashboard;
// use Mooc\Controllers\NavMooc\NavMooc;
use Mooc\Controllers\ButtonLesson\ButtonLesson;


add_action( 'init', array( 'Controllers_Init', 'init' ) );
add_action('wp_body_open', array( 'NavMooc', 'display'));//should be in Controllers_Init ?
add_action('wp_body_open', array( 'ButtonLesson', 'display'));//should be in Controllers_Init ?

add_shortcode('quiz', 'quiz');
function quiz($atts)
{
    $user = wp_get_current_user();

    if (!is_admin()) {
        if (isset($atts['id'])) {
            if (is_user_logged_in() && $atts['id'] != 0) {

                ob_start();
                (new ViewQuiz())->execute($user->ID, $atts['id']);
                return ob_get_clean();

                if (isset($_GET['action']) && $_GET['action'] == 'submit') {

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
                    ]; //should be in controller ?

                    (new SaveAnswers())->execute($user->ID, $atts['id'], serialize($answers));
                    // header('Location: ');
                }
            } else {
                (new Registration)->execute();
            }
        }
        if (isset($atts['dashboard'])) {
            ob_start();
            (new Dashboard)->execute($user->ID);
            return ob_get_clean();
        }
    }
}

add_shortcode('lesson_button', 'lesson_button');
function lesson_button($atts)
{
    if (!is_admin()) {
        if (is_user_logged_in()) {
            $user = wp_get_current_user();
            $button_lesson = new ButtonLesson;

            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'lesson_button') {
                    if ($_POST['lesson_status'] != "Completed") {
                        $button_lesson->save_lesson_completed($user->ID, $atts['lesson_id']);
                    } else {
                        $button_lesson->delete_lesson_completed($user->ID, $atts['lesson_id']);
                    }
                }
            }
            ob_start();
            $button_lesson->display($user->ID, $atts['lesson_id']);
            return ob_get_clean();
        } else {
            (new Registration)->execute();
        }
    }
}