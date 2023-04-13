<?php

namespace Mooc\Models\Quiz;

class Model_Quiz
{
    public int $id;
    public int $user_id;
    public int $quiz_id;
    public string $quiz_name;
    public string $quiz_answers;
    public string $quiz_status;
    public string $creation_date;

    //toupdate quiz_id when CRUD will be ready
    public function get(int $user_id, string $quiz_name) 
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'quizzes';
        $data = $wpdb->get_row('SELECT * FROM '. $table_name.' WHERE quiz_name = "' . $quiz_name . '" AND user_id = '.$user_id);

        if ($wpdb->num_rows > 0) {
            
            $this->id = $data->id;
            $this->user_id = $data->user_id;
            $this->quiz_id = $data->quiz_id;
            $this->quiz_name = $data->quiz_name;
            $this->quiz_answers = $data->quiz_answers;
            $this->quiz_status = $data->quiz_status;
            $this->creation_date = $data->creation_date;

            return $this;
        } else {
            return $wpdb->last_error;
        }
    }

    public static function getAll(int $user_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'quizzes';

        $sql = $wpdb->prepare("SELECT * FROM $table_name WHERE user_id = %s", $user_id);
        $data = $wpdb->get_results($sql);

        return $data;
    }

    //Update quiz_id when CRUD will be ready
    public static function save(int $user_id, int $quiz_id, string $quiz_name,string $quiz_answers, string $quiz_status)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'quizzes';
        $wpdb->insert($table_name, array(
            'user_id' => $user_id,
            'quiz_id' => $quiz_id,
            'quiz_name' => $quiz_name,
            'quiz_answers' => $quiz_answers,
            'quiz_status' => $quiz_status,
            'creation_date' => date("Y-m-d H:i:s")
        ));
    }
}