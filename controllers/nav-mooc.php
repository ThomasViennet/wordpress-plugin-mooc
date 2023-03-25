<?php

/**
 * Dashboard of a mooc student
 */

// namespace Mooc\Controllers\NavMooc;

require_once(dirname(__FILE__) . '/../models/lesson.php');

use Mooc\Models\Lesson\Model_Lesson;

class NavMooc
{
    public static function display()
    {
        require_once(ABSPATH . 'wp-includes/pluggable.php');
        if (is_user_logged_in()) {
            $user = wp_get_current_user();
            global $post;
            if (has_shortcode($post->post_content, 'nav_mooc')) {
                $lesson = (new Model_Lesson())->get_all($user->ID);
                require_once(dirname(__FILE__) . '/../views/nav-mooc.php');
            }
        }
    }
}
