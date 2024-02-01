<?php

/**
 * When the plugin is activated, this class adds the necessary tables and custom templates.
 */

namespace Mooc\Controllers;

require_once(ABSPATH . 'wp-includes/pluggable.php');

//Models
require_once(dirname(__FILE__) . '/../models/init.php');
require_once(dirname(__FILE__) . '/../models/quiz-form.php');
require_once(dirname(__FILE__) . '/../models/quiz-question.php');
require_once(dirname(__FILE__) . '/../models/quiz-option.php');
require_once(dirname(__FILE__) . '/../models/quiz-answer.php');

use Mooc\Models\Model_Init;
use Mooc\Models\Model_Form;
use Mooc\Models\Model_Question;
use Mooc\Models\Model_Option;
use Mooc\Models\Model_Answer;

//Controllers
require_once(dirname(__FILE__) . '/nav-mooc.php');
require_once(dirname(__FILE__) . '/quiz-form.php');
require_once(dirname(__FILE__) . '/quiz-question.php');
require_once(dirname(__FILE__) . '/quiz-option.php');
require_once(dirname(__FILE__) . '/quiz-certificate.php');

use Mooc\Controllers\Controller_NavMooc;
use Mooc\Controllers\Controller_Question;
use Mooc\Controllers\Controller_Option;
use Mooc\Controllers\Controller_Certificate;
use Mooc\Controllers\Controller_Form;

class Controller_Init
{
    private static $initiated = false;
    private static $formController;

    public static function init()
    {
        if (!self::$initiated) {
            self::$formController = new Controller_Form(new Model_Form(), new Model_Question(), new Model_Option(), new Model_Answer());

            self::initHooks();
        }
    }

    private static function initHooks()
    {
        self::$initiated = true;

        //Actions
        add_action('wp_before_admin_bar_render', array(__NAMESPACE__ . '\Controller_Init', 'adminBar'));
        add_action('admin_bar_menu', array(__NAMESPACE__ . '\Controller_Init', 'addLinkAdminBar'));
        add_action('admin_enqueue_scripts', array(__NAMESPACE__ . '\Controller_Init', 'styleAdmin'));
        add_action('wp_enqueue_scripts',  array(__NAMESPACE__ . '\Controller_Init', 'styleFront'));
        add_action('admin_menu', array(__NAMESPACE__ . '\Controller_Init', 'hideElements'));
        add_action('admin_menu', array(__NAMESPACE__ . '\Controller_Init', 'addElements'));
        add_action('wp_login', array(__NAMESPACE__ . '\Controller_Init', 'wpLogin'), 10, 2);
        add_action('admin_post_generate_certificate', array(__NAMESPACE__ . '\Controller_Init', 'generate_certificate'));
        add_action('admin_post_nopriv_generate_certificate', array(__NAMESPACE__ . '\Controller_Init', 'generate_certificate')); // User not logged in
        add_action('admin_post_submit_quiz_answers', array(self::$formController, 'handleQuizSubmission'));
        add_action('admin_post_nopriv_submit_quiz_answers', array(self::$formController, 'handleQuizSubmission'));
        add_action('admin_post_reset_quiz_answers', array(self::$formController, 'resetUserAnswers'));

        //Filters
        add_filter('wp_new_user_notification_email', array(__NAMESPACE__ . '\Controller_Init', 'newUserEmail'), 10, 3);

        //Shortcodes
        add_shortcode('mon_quiz', array(self::$formController, 'displayQuiz'));
    }

    //Start use self::x
    public static function createTables()
    {
        (new Model_Init)->createTables();
    }

    public static function manageForm()
    {
        return self::$formController->handleRequest();
    }

    public static function manageQuestion()
    {
        return (new Controller_Question)->handleRequest();
    }

    public static function manageOption()
    {
        return (new Controller_Option)->handleRequest();
    }

    //Displaying the navigation of the mooc taking into account the lessons completed by the user
    public static function mooc()
    {
        return (new Controller_NavMooc)->display();
    }

    //move into controllers/quiz-certificate
    public static function generate_certificate()
    {
        if (isset($_POST['user_id'], $_POST['form_id'], $_POST['certificate_nonce_field']) && wp_verify_nonce($_POST['certificate_nonce_field'], 'generate_certificate_nonce')) {
            $user_id = intval($_POST['user_id']);
            $form_id = intval($_POST['form_id']);
            $controller = new Controller_Certificate();
            $controller->generateCertificate($user_id, $form_id);
            exit;
        } else {
            wp_die('Vérification de sécurité échouée.');
        }
    }

    public static function wpLogin($user_login, \WP_User $user)
    {
        if (in_array('subscriber', (array) $user->roles)) {
            wp_safe_redirect('wp-admin/admin.php?page=dashboard');
            exit;
        } else {
            wp_safe_redirect('wp-admin');
            exit;
        }
    }

    public static function newUserEmail($wp_new_user_notification_email, $user, $blogname)
    {
        $message = sprintf(__('Bienvenue ' . $user->user_login . ' !')) . "\r\n\r\n";
        $message .= 'J’ai créé cette formation pour aider ceux qui souhaitent s’initier au SEO gratuitement.' . "\r\n";
        $message .= 'Pour me donner un coup de pouce, ajouter en 1 seconde votre avis en cliquant sur ce lien https://g.page/r/CaBcALRtf65YEB0/review 🫶' . "\r\n\r\n";
        $message .= 'Pour configurer votre mot de passe, rendez-vous à l’adresse suivante :' . "\r\n";
        $message .= network_site_url("wp-login.php?action=rp&key=" . get_password_reset_key($user) . "&login=" . rawurlencode($user->user_login), 'login') . "\r\n\r\n";
        $message .= "Bonne lecture," . "\r\n";
        $message .= "Thomas Viennet" . "\r\n";

        $wp_new_user_notification_email['message'] = $message;
        $wp_new_user_notification_email['subject'] = 'Inscription formation SEO';
        $wp_new_user_notification_email['headers'] = 'From: Référencime<contact@referencime.fr>';

        return $wp_new_user_notification_email;
    }

    //end use self::x

    public static function addElements()
    {
        add_menu_page(
            'Mooc', // Titre de la page
            'Formation SEO', // Titre du menu
            'read', // Capacité requise
            //slug de devait être 'mooc'
            'dashboard', // Slug du menu
            array(__NAMESPACE__ . '\Controller_Init', 'mooc'), // Fonction de rappel
            'dashicons-welcome-learn-more', // Icône
            6
        ); // Position

        add_submenu_page(
            'dashboard', // Slug du menu parent
            'Forms', // Titre de la page
            'Gérer forms', // Titre du sous-menu
            'manage_options', // Capacité requise
            'manage-form', // Slug du sous-menu
            array(__NAMESPACE__ . '\Controller_Init', 'manageForm') // Fonction de rappel pour le contenu du sous-menu
        );

        add_submenu_page(
            'dashboard', // Slug du menu parent
            'Questions', // Titre de la page
            'Gérer questions', // Titre du sous-menu
            'manage_options', // Capacité requise
            'manage-question', // Slug du sous-menu
            array(__NAMESPACE__ . '\Controller_Init', 'manageQuestion') // Fonction de rappel pour le contenu du sous-menu
        );

        add_submenu_page(
            'dashboard', // Slug du menu parent
            'Options', // Titre de la page
            'Gérer options', // Titre du sous-menu
            'manage_options', // Capacité requise
            'manage-option', // Slug du sous-menu
            array(__NAMESPACE__ . '\Controller_Init', 'manageOption') // Fonction de rappel pour le contenu du sous-menu
        );
    }

    public static function hideElements() //should be part of the theme and not this plugin
    {
        $user = wp_get_current_user();
        if (in_array('subscriber', (array) $user->roles)) {
            remove_action('admin_notices', 'update_nag', 3);
            add_filter('admin_footer_text', '__return_empty_string', 11);
            add_filter('update_footer',     '__return_empty_string', 11);
            remove_menu_page('index.php');
            remove_menu_page('kk-star-ratings');
        }
    }

    public static function addLinkAdminBar($admin_bar)
    {
        if (!is_admin()) {
            $args = array(
                'parent' => false,
                'id'     => 'formation-seo',
                'title'  => 'Formation SEO',
                'href'   => esc_url(admin_url('admin.php?page=dashboard')),
                'meta'   => false
            );
            $admin_bar->add_node($args);
        }
    }

    public static function adminBar() //should be part of the theme and not this plugin
    {
        $user = wp_get_current_user();
        if (in_array('subscriber', (array) $user->roles)) {
            global $wp_admin_bar;
            $wp_admin_bar->remove_menu('wp-logo');
            $wp_admin_bar->remove_node('dashboard');

            if (!is_admin()) {
                $wp_admin_bar->remove_node('site-name');
            }
        }
    }

    public static function styleAdmin()
    {
        echo '<link rel="stylesheet" href="' . plugins_url('/../assets/css/admin-nav-mooc.css', __FILE__) . '" type="text/css" media="all" />';
    }

    public static function styleFront()
    {
        echo '
        <link rel="stylesheet" href="' . plugins_url('/../assets/css/nav-mooc.css', __FILE__) . '" type="text/css" media="all" />
        <link rel="stylesheet" href="' . plugins_url('/../assets/css/quiz.css', __FILE__) . '" type="text/css" media="all" />
        <link rel="stylesheet" href="' . plugins_url('/../assets/css/lesson.css', __FILE__) . '" type="text/css" media="all" />
        <link rel="stylesheet" href="' . plugins_url('/../assets/css/button-lesson.css', __FILE__) . '" type="text/css" media="all" />
        <script type="text/javascript" src="' . plugins_url('/../assets/js/nav-mooc.js', __FILE__) . '"></script>';
    }
}
