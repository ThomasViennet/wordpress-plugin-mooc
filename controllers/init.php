<?php

/**
 * When the plugin is activated, this class adds the necessary tables and custom templates.
 */

// namespace Mooc\Controllers\Init;

require_once(dirname(__FILE__) . '/../models/init.php');
require_once(dirname(__FILE__) . '/nav-mooc.php');
require_once(ABSPATH . 'wp-includes/pluggable.php');

use Mooc\Models\Init\Model_Init;
use Mooc\Controllers\NavMooc\Controller_NavMooc;

class Controller_Init
{
    private static $initiated = false;

    public static function init()
    {
        if (!self::$initiated) {
            self::initHooks();
        }
    }

    private static function initHooks()
    {
        self::$initiated = true;

        add_action('wp_before_admin_bar_render', array('Controller_Init', 'adminBar'));
        add_action('admin_bar_menu', array('Controller_Init', 'addLinkAdminBar'));
        add_action('admin_enqueue_scripts', array('Controller_Init', 'styleAdmin'));
        add_action('wp_enqueue_scripts',  array('Controller_Init', 'styleFront'));
        add_action('admin_menu', array('Controller_Init', 'hideElements'));
        add_action('admin_menu', array('Controller_Init', 'addElements'));
        add_action('wp_login', array('Controller_Init', 'wpLogin'), 10, 2);

        add_filter('wp_new_user_notification_email', array('Controller_Init', 'newUserEmail'), 10, 3);
    }

    public static function createTables()
    {
        (new Model_Init)->createTables();
    }

    public static function addElements()
    {
        remove_menu_page('index.php');
        add_menu_page('Mooc', 'Formation SEO', 'read', 'dashboard', array('Controller_Init', 'mooc'), 'dashicons-welcome-learn-more', 6);
    }

    //Displaying the navigation of the mooc taking into account the lessons completed by the user
    public static function mooc()
    {
        return (new Controller_NavMooc)->display();
    }

    public static function adminBar()
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

    public static function hideElements()
    {
        $user = wp_get_current_user();
        if (in_array('subscriber', (array) $user->roles)) {
            remove_action('admin_notices', 'update_nag', 3);
            add_filter('admin_footer_text', '__return_empty_string', 11);
            add_filter('update_footer',     '__return_empty_string', 11);
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

    public static function wpLogin($user_login, WP_User $user)
    {
        if (in_array('subscriber', (array) $user->roles)) {
            wp_safe_redirect('wp-admin/admin.php?page=dashboard');
            exit;
        } else {
            wp_safe_redirect('wp-admin');
            exit;
        }
    }

    function newUserEmail($wp_new_user_notification_email, $user, $blogname)
    {
        $message = sprintf(__('Bienvenue ' . $user->user_login . ' !')) . "\r\n\r\n";
        $message .= 'J’ai créé cette formation pour aider ceux qui souhaitent s’initier au SEO gratuitement.' . "\r\n\r\n";
        $message .= 'Pour me donner un coup de pouce, ajouter en 1 seconde votre avis 🫶 ' . "\r\n";
        $message .= 'https://g.page/r/CaBcALRtf65YEB0/review' . "\r\n\r\n";
        $message .= 'Pour configurer votre mot de passe, rendez-vous à l’adresse suivante :' . "\r\n";
        $message .= network_site_url("wp-login.php?action=rp&key=" . get_password_reset_key($user) . "&login=" . rawurlencode($user->user_login), 'login') . "\r\n\r\n";
        $message .= "Bonne lecture," . "\r\n";
        $message .= "Thomas Viennet" . "\r\n";

        $wp_new_user_notification_email['message'] = $message;
        $wp_new_user_notification_email['subject'] = 'Inscription formation SEO';
        $wp_new_user_notification_email['headers'] = 'From: Référencime<contact@referencime.fr>';

        return $wp_new_user_notification_email;
    }
}
