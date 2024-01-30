<?php

/**
 * Action of the button to complete a lesson
 */

namespace Mooc\Controllers;

require_once(dirname(__FILE__) . '/../models/lesson.php');

use Mooc\Models\Model_Lesson;

class Controller_Lesson
{
    public static function displayButton(int $user_id, string $lesson_slug)
    {
        if (!empty((new Model_Lesson())->get($user_id, $lesson_slug))) {
            $lesson_status = "Completed";
            $label_button = "Je n'ai pas terminé ce cours";
        } else {
            $lesson_status = "Uncompleted";
            $label_button = "J'ai terminé ce cours";
        }

        //add the slug of next lesson to the target of the button
        // $nextLesson_slug = (new Model_Lesson())->getNextLessonSlug($lesson_slug);
        require_once(dirname(__FILE__) . '/../views/front/button-lesson.php');
    }

    public static function saveLessonCompleted(int $user_id, string $lesson_slug)
    {
        (new Model_Lesson())->save($user_id, $lesson_slug);
    }

    public static function deleteLessonCompleted(int $user_id, string $lesson_slug)
    {
        (new Model_Lesson())->delete($user_id, $lesson_slug);
    }
}
