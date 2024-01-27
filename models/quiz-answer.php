<?php

namespace Mooc\Models;

class Model_Answer
{
    private $wpdb;
    private $table_answers;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_answers = $wpdb->prefix . 'mooc_quizzes_answers';
    }

    public function getUserFormAnswers($user_id, $form_id)
    {
        $query = $this->wpdb->prepare(
            "SELECT answers FROM {$this->table_answers} WHERE user_id = %d AND form_id = %d",
            $user_id,
            $form_id
        );
        $result = $this->wpdb->get_var($query);
        return $result ? unserialize($result) : false;
    }

    public function deleteUserFormAnswers($user_id, $form_id)
    {
        $query = $this->wpdb->prepare(
            "DELETE FROM {$this->table_answers} WHERE user_id = %d AND form_id = %d",
            $user_id,
            $form_id
        );
        $this->wpdb->query($query);
    }
}
