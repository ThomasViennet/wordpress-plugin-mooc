<?php

/**
 * Dashboard of a mooc student
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
        $user = wp_get_current_user();

        $lessons = (new Model_Lesson())->getAll($user->ID);
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
