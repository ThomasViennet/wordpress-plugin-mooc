<?php

/**
 * Dashboard of a mooc student
 */

namespace Mooc\Controllers\ButtonLesson;

require_once(dirname(__FILE__) . '/../models/lesson.php');

use Mooc\Models\Lesson\Model_Lesson;

class ButtonLesson
{
    public function display(int $user_id, string $lesson_id)
    {

        if (!empty((new Model_Lesson())->get($user_id, $lesson_id))) {
            $lesson_status = "Completed";
            $label_button = "Je n'ai pas terminé ce cours";
        } else {
            $lesson_status = "Uncompleted";
            $label_button = "J'ai terminé ce cours";
        }
        
        require_once(dirname(__FILE__) . '/../views/button-lesson.php');


        //to delete but when nav is here data is uptodate
        // require_once(ABSPATH . 'wp-includes/pluggable.php');
        // if (is_user_logged_in()) {
        //     $user = wp_get_current_user();
        //     global $post;
        //     if (has_shortcode($post->post_content, 'nav_mooc')) {
        //         $lessons = (new Model_Lesson())->get_all($user->ID);
                
        //         $lessons_id = array();
        //         foreach ($lessons as $lesson) {
        //             array_push($lessons_id, $lesson->lesson_id);
        //         }

        //         var_dump($lessons_id);
                
        //         require_once(dirname(__FILE__) . '/../views/nav-mooc.php');
        //     }
        // }
    }

    public function save_lesson_completed(int $user_id, int $lesson_id)
    {
        (new Model_Lesson())->save($user_id, $lesson_id);
    }

    public function delete_lesson_completed(int $user_id, int $lesson_id)
    {
        (new Model_Lesson())->delete($user_id, $lesson_id);
    }
}
