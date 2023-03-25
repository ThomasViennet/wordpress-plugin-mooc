<?php

namespace Mooc\Models\Lesson;

class Lesson
{
    public int $id;
    public int $user_id;
    public int $lesson_id;
    public string $creation_date;

    public function get(int $user_id, int $lesson_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'lessons';
        $data = $wpdb->get_row("SELECT * FROM $table_name WHERE user_id = $user_id AND lesson_id = $lesson_id");

        if ($wpdb->num_rows > 0) {
            $this->id = $data->id;
            $this->user_id = $data->user_id;
            $this->lesson_id = $data->lesson_id;
            $this->creation_date = $data->creation_date;

            return $this;
        } else {
            return $wpdb->last_error;
        }
    }

    public function get_all(int $user_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'lessons';
        $data = $wpdb->get_row("SELECT * FROM $table_name WHERE user_id = $user_id");

        //Shloud return array of all lessons completed by user
        if ($wpdb->num_rows > 0) {
            $this->id = $data->id;
            $this->user_id = $data->user_id;
            $this->lesson_id = $data->lesson_id;
            $this->creation_date = $data->creation_date;

            return $this;
        } else {
            return $wpdb->last_error;
        }
    }

    public function save(int $user_id, int $lesson_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'lessons';

        $wpdb->insert($table_name, array(
            'user_id' => $user_id,
            'lesson_id' => $lesson_id,
            'creation_date' => date("Y-m-d H:i:s")
        ));
    }

    public function delete(int $user_id, int $lesson_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'lessons';

        $wpdb->delete($table_name, array('user_id' => $user_id, 'lesson_id' => $lesson_id));
    }
}
