<?php

/**
 * Dashboard of a mooc student
 * USELESS?
 */

namespace Mooc\Controllers\NavMooc;

require_once(dirname(__FILE__) . '/../models/lesson.php');
require_once(dirname(__FILE__) . '/../models/quiz.php');

use Mooc\Models\Lesson\Model_Lesson;
use Mooc\Models\Quiz\Model_Quiz;

class Controller_NavMooc
{
    public static function display()
    {
        require_once(ABSPATH . 'wp-includes/pluggable.php');
        if (is_user_logged_in()) {
            $user = wp_get_current_user();
            global $post;
            if (has_shortcode($post->post_content, 'nav_mooc')) {

                $lessons = (new Model_Lesson())->get_all($user->ID);
                $lessons_slug = array();
                foreach ($lessons as $lesson) {
                    array_push($lessons_slug, $lesson->lesson_slug);
                }

                $quizzes = (new Model_Quiz())->get_all($user->ID);
                $quizzes_name_win = array();
                $quizzes_name_failed = array();
                
                foreach ($quizzes as $quiz) {
                    if ($quiz->quiz_status == 'Success') {
                        array_push($quizzes_name_win, $quiz->quiz_name);
                    } elseif ($quiz->quiz_status == 'Failed') {
                        array_push($quizzes_name_failed, $quiz->quiz_name);
                    }
                }

                require_once(dirname(__FILE__) . '/../views/nav-mooc.php');
            }
        }
    }
}
