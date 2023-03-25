<?php

/**
 * Dashboard of a mooc student
 */

namespace Mooc\Controllers\ButtonLesson;

require_once(dirname(__FILE__) . '/../models/lesson.php');

use Mooc\Models\Lesson\Lesson;

class ButtonLesson
{
    public function display_button(int $user_id, int $lesson_id)
    {

        if (!empty((new Lesson())->get($user_id, $lesson_id))) {
            $lesson_status = "Completed";
            $label_button = "Je n'ai pas terminé ce cours";
        } else {
            $lesson_status = "Uncompleted";
            $label_button = "J'ai terminé ce cours";
        }
        require_once(dirname(__FILE__) . '/../views/button-lesson.php');
    }

    public function save_lesson_completed(int $user_id, int $lesson_id)
    {
        (new Lesson())->save($user_id, $lesson_id);
    }

    public function delete_lesson_completed(int $user_id, int $lesson_id)
    {
        (new Lesson())->delete($user_id, $lesson_id);
    }
}
