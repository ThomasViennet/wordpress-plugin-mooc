<?php

/**
 * When the plugin is activated, this class adds the necessary tables and custom templates.
 */

// namespace Mooc\Controllers\Initialisation;

require_once(dirname(__FILE__) . '/../models/init.php');
require_once(dirname(__FILE__) . '/../models/lesson.php');
require_once(ABSPATH . 'wp-includes/pluggable.php');


use Mooc\Models\Init\Models_Init;
use Mooc\Models\Lesson\Model_Lesson;

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
        add_action('admin_menu', array('Controllers_Init', 'adminMenu'), 1);
        add_action('admin_bar_menu', array('Controllers_Init', 'addLinkAdminBar'));
        add_action('admin_enqueue_scripts', array('Controllers_Init', 'styleAdmin'));
        add_action('wp_enqueue_scripts',  array('Controllers_Init', 'styleFront'));
        // add_action('wp_body_open', array('Controllers_Init', 'displayNav'));

        add_filter('login_redirect', array('Controllers_Init', 'loginRedirect'));
        // add_filter('login_redirect', array('Controllers_Init', 'loginRedirect'), 10, 3);

        // add_shortcode('nav_mooc', array('Controllers_Init', 'navMooc'));//shloud be in mooc.php ?
        // add_shortcode('lesson_button', array('Controllers_Init', 'lesson_button'));
    }

    public static function createTables()
    {
        (new Models_Init())->createTales();
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

    public static function adminMenu()
    {
        $user = wp_get_current_user();
        if (in_array('subscriber', (array) $user->roles)) {
            remove_menu_page('index.php');
            add_menu_page('Mooc', 'Formation SEO', 'subscriber', 'dashboard', 'mooc', 'dashicons-welcome-learn-more', 6);
            // add_submenu_page('my-menu', 'Submenu Page Title', 'Whatever You Want', 'manage_options', 'my-menu');
            // add_submenu_page('my-menu', 'Submenu Page Title2', 'Whatever You Want2', 'manage_options', 'my-menu2');
        }
    }

    public static function mooc()
    {
        $user = wp_get_current_user();
        require_once('views/dashboard.php');
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

    public static function styleAdmin()
    {
        echo '<link rel="stylesheet" href="' . plugins_url('css/dashboard.css', __FILE__) . '" type="text/css" media="all" />';
    }

    public static function styleFront()
    {
        echo '
        <link rel="stylesheet" href="' . plugins_url('/../css/nav-mooc.css', __FILE__) . '" type="text/css" media="all" />
        <script type="text/javascript" src="' . plugins_url('/../js/nav-mooc.js', __FILE__) . '"></script>';
    }

    // public static function navMooc()
    // {
    // }

    // public static function displayNav()
    // {
    //     require_once(ABSPATH . 'wp-includes/pluggable.php');
    //     if (is_user_logged_in()) {
    //         $user = wp_get_current_user();
    //         global $post;
    //         if (has_shortcode($post->post_content, 'nav_mooc')) {
    //             $lessons = (new Model_Lesson())->get_all($user->ID);
                
    //             $lessons_id = array();
    //             foreach ($lessons as $lesson) {
    //                 array_push($lessons_id, $lesson->lesson_id);
    //             }

    //             var_dump($lessons_id);
                
    //             require_once(dirname(__FILE__) . '/../views/nav-mooc.php');
    //         }
    //     }
    // }


    public static function loginRedirect($redirect_to, $request, $user)
    {
        return home_url('wp-admin/admin.php?page=dashboard');
    }
}
