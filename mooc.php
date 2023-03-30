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

use Mooc\Controllers\SaveAnswers\SaveAnswers;
use Mooc\Controllers\ViewQuiz\ViewQuiz;
use Mooc\Controllers\Registration\Registration;
use Mooc\Controllers\Dashboard\Dashboard;
use Mooc\Controllers\ButtonLesson\ButtonLesson;

// START - need a controller
require_once('models/lesson.php');
require_once('models/init.php');

use Mooc\Models\Lesson\Model_Lesson;
use Mooc\Models\Init\Model_Init;
// END - need a controller

register_activation_hook(__FILE__, 'createTables');
function createTables()
{
    (new Model_Init)->createTables();
}

//Contains the filters and actions hooks
add_action('init', array('Controllers_Init', 'init'));

add_shortcode('lesson_button', 'lesson_button');
function lesson_button($atts)
{
    if (!is_admin()) {
        if (is_user_logged_in()) {

            $user = wp_get_current_user();
            $button_lesson = new ButtonLesson;
            global $post;

            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'lesson_button') {

                    if ($_POST['lesson_status'] != "Completed") {
                        $button_lesson->save_lesson_completed($user->ID, basename(get_permalink()));
                    } else {
                        $button_lesson->delete_lesson_completed($user->ID, basename(get_permalink()));
                    }
                }
            }

            ob_start();
            $button_lesson->display($user->ID, basename(get_permalink()));
            return ob_get_clean();
        }
    }
}

//WIP
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
                    ]; //should be in controller

                    (new SaveAnswers())->execute($user->ID, $atts['id'], serialize($answers));
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

add_shortcode('nav_mooc', 'navMooc');
function navMooc()
{
    if (!is_admin()) {
        require_once(ABSPATH . 'wp-includes/pluggable.php'); //Useless ?
        if (is_user_logged_in()) {
            $user = wp_get_current_user();
            global $post;
            if (has_shortcode($post->post_content, 'nav_mooc')) {
                $lessons = (new Model_Lesson)->get_all($user->ID);

                $lessons_slug = array();
                foreach ($lessons as $lesson) {
                    array_push($lessons_slug, $lesson->lesson_slug);
                }

                ob_start();
                require_once('views/nav-mooc.php');
                return ob_get_clean();
            }
        }
    }
}

//START - Should be in controllers init
//Add item "Formation SEO" at the admin menu which one target the dashboard of the mooc in BO
add_action('admin_menu', 'adminMenu');
function adminMenu()
{
    $user = wp_get_current_user();
    if (in_array('subscriber', (array) $user->roles)) {
        remove_menu_page('index.php');
        add_menu_page('Mooc', 'Formation SEO', 'subscriber', 'dashboard', 'mooc', 'dashicons-welcome-learn-more', 6);
    }
}

//Displaying the navigation of the mooc taking into account the lessons completed by the user
function mooc()
{
    $user = wp_get_current_user();
    $lessons = (new Model_Lesson)->get_all($user->ID);

    $lessons_slug = array();
    foreach ($lessons as $lesson) {
        array_push($lessons_slug, $lesson->lesson_slug);
    }

    require_once('views/nav-mooc.php');
}

//END - Should be in controllers init

add_shortcode('registration', 'registration');
function registration()
{
    if (!is_admin()) {
        if (!is_user_logged_in()) {
            (new Registration)->execute();
        } else {
            # code...
        }
    }
}
