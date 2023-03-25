<?php

namespace Mooc\Models\Mooc;

class Mooc
{
    public int $id;
    public int $user_id;
    public int $quiz_id;
    public string $quiz_answers;
    public string $creation_date;
}

class MoocFreeSeo
{

    public function get(int $user_id, int $quiz_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'mooc';
        $data = $wpdb->get_row("SELECT * FROM $table_name WHERE user_id = 1");

        if ($wpdb->num_rows > 0) {
            $moocFreeSeo = new Mooc;
            $moocFreeSeo->id = $data->id;
            $moocFreeSeo->user_id = $data->user_id;
            $moocFreeSeo->quiz_id = $data->quiz_id;
            $moocFreeSeo->quiz_answers = $data->quiz_answers;
            $moocFreeSeo->creation_date = $data->creation_date;

            return $moocFreeSeo;
        } else {
            return $wpdb->last_error;
        }
    }

    public function save(int $user_id, int $quiz_id, string $quiz_answers)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'mooc';
        $wpdb->insert($table_name, array(
            'user_id' => $user_id,
            'quiz_id' => $quiz_id,
            'quiz_answers' => $quiz_answers,
            'creation_date' => date("Y-m-d H:i:s")
        ));
    }
}