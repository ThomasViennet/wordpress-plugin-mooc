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
                $lessons_id = array();
                foreach ($lessons as $lesson) {
                    array_push($lessons_id, $lesson->lesson_id);
                }

                $quizzes = (new Model_Quiz())->get_all($user->ID);
                $quizzes_name = array();
                foreach ($quizzes as $quiz) {
                    array_push($quizzes_name, $quiz->quiz_name);
                }

                var_dump($quizzes_name);
                
                require_once(dirname(__FILE__) . '/../views/nav-mooc.php');
            }
        }
    }
}
