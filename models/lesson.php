<?php

namespace Mooc\Models\Lesson;

class Model_Lesson
{
    public int $id;
    public int $user_id;
    public int $lesson_id;
    public string $lesson_slug;
    public string $creation_date;

    public function get(int $user_id, string $lesson_slug)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'lessons';
        $data = $wpdb->get_row('SELECT * FROM '.$table_name.' WHERE user_id = '.$user_id.' AND lesson_slug = "'.$lesson_slug.'"');

        if ($wpdb->num_rows > 0) {
            $this->id = $data->id;
            $this->user_id = $data->user_id;
            $this->lesson_slug = $data->lesson_slug;
            $this->creation_date = $data->creation_date;

            return $this;
        } else {
            return $wpdb->last_error;
        }
    }

    public static function getAll(int $user_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'lessons';

        $sql = $wpdb->prepare("SELECT * FROM $table_name WHERE user_id = %s", $user_id);
        $data = $wpdb->get_results($sql);

        return $data;
    }

    public static function save(int $user_id, string $lesson_slug)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'lessons';

        $wpdb->insert($table_name, array(
            'user_id' => $user_id,
            'lesson_slug' => $lesson_slug,
            'creation_date' => date("Y-m-d H:i:s")
        ));
    }

    public static function delete(int $user_id, string $lesson_slug)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'lessons';

        $wpdb->delete($table_name, array(
            'user_id' => $user_id,
            'lesson_slug' => $lesson_slug
        ));
    }
}
