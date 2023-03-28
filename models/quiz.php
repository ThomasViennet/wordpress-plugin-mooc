<?php

namespace Mooc\Models\Quiz;

class Quiz
{
    public int $id;
    public int $user_id;
    public int $quiz_id;
    public string $quiz_answers;
    public string $creation_date;

    public function get(int $user_id, int $quiz_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'quizzes';
        $data = $wpdb->get_row("SELECT * FROM $table_name WHERE user_id = 1");

        if ($wpdb->num_rows > 0) {
            
            $this->id = $data->id;
            $this->user_id = $data->user_id;
            $this->quiz_id = $data->quiz_id;
            $this->quiz_answers = $data->quiz_answers;
            $this->creation_date = $data->creation_date;

            return $this;
        } else {
            return $wpdb->last_error;
        }
    }

    public function save(int $user_id, int $quiz_id, string $quiz_answers)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'quizzes';
        $wpdb->insert($table_name, array(
            'user_id' => $user_id,
            'quiz_id' => $quiz_id,
            'quiz_answers' => $quiz_answers,
            'creation_date' => date("Y-m-d H:i:s")
        ));
    }
}