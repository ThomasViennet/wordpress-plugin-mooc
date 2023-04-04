<?php

/**
 * Dashboard of a mooc student
 */

namespace Mooc\Controllers\Lesson;

require_once(dirname(__FILE__) . '/../models/lesson.php');

use Mooc\Models\Lesson\Model_Lesson;

class Controller_Lesson
{
    public function displayButton(int $user_id, string $lesson_slug)
    {
        if (!empty((new Model_Lesson())->get($user_id, $lesson_slug))) {
            $lesson_status = "Completed";
            $label_button = "Je n'ai pas terminé ce cours";
        } else {
            $lesson_status = "Uncompleted";
            $label_button = "J'ai terminé ce cours";
        }

        require_once(dirname(__FILE__) . '/../views/button-lesson.php');
    }

    public function saveLessonCompleted(int $user_id, string $lesson_slug)
    {
        (new Model_Lesson())->save($user_id, $lesson_slug);
    }

    public function deleteLessonCompleted(int $user_id, string $lesson_slug)
    {
        (new Model_Lesson())->delete($user_id, $lesson_slug);
    }
}
