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

require_once('controllers/initialisation.php');
require_once('controllers/save-answers.php');
require_once('controllers/dashboard.php');
require_once('controllers/view-quiz.php');
require_once('controllers/registration.php');
require_once('controllers/nav-mooc.php');
require_once('controllers/button-lesson.php');
// require_once('lib/wp_admin_bar_my_account_menu.php');

use Mooc\Controllers\Initialisation\Controllers_Initialisation;
use Mooc\Controllers\SaveAnswers\SaveAnswers;
use Mooc\Controllers\ViewQuiz\ViewQuiz;
use Mooc\Controllers\Registration\Registration;
use Mooc\Controllers\Dashboard\Dashboard;
use Mooc\Controllers\NavMooc\NavMooc;
use Mooc\Controllers\ButtonLesson\ButtonLesson;
// use wp_admin_bar_my_account_menu;


// $create_table = new Controllers_Initialisation;
// $initControllers = new Controllers_Initialisation;
// register_activation_hook(__FILE__, $initConrtollers->createTables());

// function admin_bar()
// {
//     $initControllers = new Controllers_Initialisation;
//     return $initControllers->adminbar();
// }

// global $wp_admin_bar;
// add_action('wp_before_admin_bar_render', $initControllers->adminbar($wp_admin_bar), 0);
// add_action( 'init', 'init');
add_action( 'init', array( 'Controllers_Initialisation', 'init' ) );

// Start Template
// function admin_menu()
// {
//     $user = wp_get_current_user();
//     if (in_array('subscriber', (array) $user->roles)) {
//         remove_menu_page('index.php');
//         add_menu_page('Mooc', 'Formation SEO', 'subscriber', 'dashboard', 'mooc', 'dashicons-welcome-learn-more', 6);
//         // add_submenu_page('my-menu', 'Submenu Page Title', 'Whatever You Want', 'manage_options', 'my-menu');
//         // add_submenu_page('my-menu', 'Submenu Page Title2', 'Whatever You Want2', 'manage_options', 'my-menu2');
//     }
// }
// add_action('admin_menu', 'admin_menu', 1);

function mooc()
{
    $user = wp_get_current_user();
    require_once('views/dashboard.php');
}

function add_link_to_admin_bar($admin_bar)
{
    if (!is_admin()) {
        $args = array(
            'parent' => false,
            'id'     => 'formation-seo',
            'title'  => 'Formation SEO',
            'href'   => esc_url(admin_url('admin.php?page=dashboard')),
            'meta'   => false
        );
    } else {
        $args = array(
            'parent' => false,
            'id'     => 'retour-site',
            'title'  => 'Retour au site',
            'href'   => esc_url('/'),
            'meta'   => false
        );
    }
    $admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'add_link_to_admin_bar', 999);

function style_admin()
{
    echo '<link rel="stylesheet" href="' . plugins_url('css/dashboard.css', __FILE__) . '" type="text/css" media="all" />';
}
add_action('admin_enqueue_scripts', 'style_admin');

function style_front()
{
    echo '<link rel="stylesheet" href="' . plugins_url('css/nav-mooc.css', __FILE__) . '" type="text/css" media="all" />';
    ob_start();
?>
    <!-- Use link rel -->
    <script>
        <?php
        require_once('js/nav-mooc.js');
        ?>
    </script>
<?php
    echo ob_get_clean();
}
add_action('wp_enqueue_scripts', 'style_front');

// End Template

function login_redirect($redirect_to, $request, $user)
{
    return home_url('wp-admin/admin.php?page=dashboard');
}
add_filter('login_redirect', 'login_redirect', 10, 3);


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

function nav_mooc()
{
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        global $post;
        if (has_shortcode($post->post_content, 'nav_mooc')) {
            ob_start();
            (new NavMooc)->execute($user->ID);
            echo ob_get_clean();
        }
    }
}
add_action('wp_body_open', 'nav_mooc');
add_shortcode('nav_mooc', 'nav_mooc');

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
            $button_lesson->display_button($user->ID, $atts['lesson_id']);
            return ob_get_clean();
        } else {
            (new Registration)->execute();
        }
    }
}
// add_shortcode('registration', 'registration');
// function registration()
// {
// }

// add_shortcode('lessonCompleted', 'lessonCompleted');
// function lessonCompleted()
// {
// }
