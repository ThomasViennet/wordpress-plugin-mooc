<?php

/**
 * When the plugin is activated, this class adds the necessary tables and custom templates.
 */

// namespace Mooc\Controllers\Initialisation;

require_once(dirname(__FILE__) . '/../models/initialisation.php');
require_once(ABSPATH . 'wp-includes/pluggable.php');

use Mooc\Models\Initialisation\InitialisationModels;

class Controllers_Initialisation
{
    private static $initiated = false;

    public static function init()
    {
        if (!self::$initiated) {
            self::init_hooks();
        }
    }
    private static function init_hooks()
    {
        self::$initiated = true;

        add_action('wp_before_admin_bar_render', array('Controllers_Initialisation', 'adminBar'), 0);
        add_action('admin_menu', array('Controllers_Initialisation', 'admin_menu'), 1);
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

    public static function admin_menu()
    {
        $user = wp_get_current_user();
        if (in_array('subscriber', (array) $user->roles)) {
            remove_menu_page('index.php');
            add_menu_page('Mooc', 'Formation SEO', 'subscriber', 'dashboard', 'mooc', 'dashicons-welcome-learn-more', 6);
            // add_submenu_page('my-menu', 'Submenu Page Title', 'Whatever You Want', 'manage_options', 'my-menu');
            // add_submenu_page('my-menu', 'Submenu Page Title2', 'Whatever You Want2', 'manage_options', 'my-menu2');
        }
    }


    public function createTables()
    {
        (new InitialisationModels())->createTales();
    }
}
