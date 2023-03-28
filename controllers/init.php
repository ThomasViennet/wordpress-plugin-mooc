<?php

/**
 * When the plugin is activated, this class adds the necessary tables and custom templates.
 */

// namespace Mooc\Controllers\Init;

require_once(dirname(__FILE__) . '/../models/init.php');
require_once(dirname(__FILE__) . '/../models/lesson.php');
require_once(ABSPATH . 'wp-includes/pluggable.php');


use Mooc\Models\Init\Model_Init;

class Controllers_Init
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

        register_activation_hook(__FILE__, 'createTables');

        add_action('wp_before_admin_bar_render', array('Controllers_Init', 'adminBar'));
        // add_action('admin_menu', array('Controllers_Init', 'adminMenu'), 1);
        add_action('admin_bar_menu', array('Controllers_Init', 'addLinkAdminBar'));
        add_action('admin_enqueue_scripts', array('Controllers_Init', 'styleAdmin'));
        add_action('wp_enqueue_scripts',  array('Controllers_Init', 'styleFront'));

        add_filter('wp_login', array('Controllers_Init', 'wpLogin'));
        add_filter('wp_new_user_notification_email', array('Controllers_Init', 'custom_wp_new_user_notification_email'), 10, 3);
    }

    public static function createTables() //doesn't work here but work in mooc.php
    {
        (new Model_Init)->createTables();
    }

    public static function adminBar()
    {
        $user = wp_get_current_user();
        if (in_array('subscriber', (array) $user->roles)) {
            global $wp_admin_bar;
            $wp_admin_bar->remove_menu('wp-logo');
            $wp_admin_bar->remove_node('site-name');
            $wp_admin_bar->remove_node('dashboard');
        }
    }

    // public static function adminMenu()
    // {
    //     $user = wp_get_current_user();
    //     if (in_array('subscriber', (array) $user->roles)) {
    //         remove_menu_page('index.php');
    //         add_menu_page('Mooc', 'Formation SEO', 'subscriber', 'dashboard', 'mooc', 'dashicons-welcome-learn-more', 6);
    //         // add_submenu_page('my-menu', 'Submenu Page Title', 'Whatever You Want', 'manage_options', 'my-menu');
    //         // add_submenu_page('my-menu', 'Submenu Page Title2', 'Whatever You Want2', 'manage_options', 'my-menu2');
    //     }
    // }

    // public static function mooc()
    // {
    //     ob_start();
    //     require_once(dirname(__FILE__) . '/../views/dashboard.php');
    //     return ob_get_clean();
    // }

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
        } else {
            $args = array(
                'parent' => false,
                'id'     => 'retour-site',
                'title'  => 'Retour au site',
                'href'   => esc_url(get_home_url('/')),
                'meta'   => false
            );
        }
        $admin_bar->add_node($args);
    }

    public static function styleAdmin()
    {
        echo '<link rel="stylesheet" href="' . plugins_url('/../css/admin-nav-mooc.css', __FILE__) . '" type="text/css" media="all" />';
    }

    public static function styleFront()
    {
        echo '
        <link rel="stylesheet" href="' . plugins_url('/../css/nav-mooc.css', __FILE__) . '" type="text/css" media="all" />
        <link rel="stylesheet" href="' . plugins_url('/../css/quiz.css', __FILE__) . '" type="text/css" media="all" />
        <script type="text/javascript" src="' . plugins_url('/../js/nav-mooc.js', __FILE__) . '"></script>';
    }

    public static function wpLogin()
    {
        wp_safe_redirect('wp-admin/admin.php?page=dashboard');
        exit;
    }

    function custom_wp_new_user_notification_email($wp_new_user_notification_email, $user, $blogname)
    {
        $message = sprintf(__('Bienvenue ' . $user->user_login . ' !')) . "\r\n\r\n";
        $message .= 'J’ai créé cette formation pour aider ceux qui souhaitent s’initier SEO gratuitement.' . "\r\n";
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
