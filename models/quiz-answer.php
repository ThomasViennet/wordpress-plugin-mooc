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
            "SELECT answers, form_submitted, certificate_number FROM {$this->table_answers} WHERE user_id = %d AND form_id = %d",
            $user_id,
            $form_id
        );
        $row = $this->wpdb->get_row($query);
        return $row ? array(
            'answers' => unserialize($row->answers),
            'submitted' => $row->form_submitted,
            'certificate_number' => $row->certificate_number
        ) : false;
    }

    public function saveAnswers($user_id, $form_id, $answers)
    {
        $answers_serialized = maybe_serialize($answers);
        $certificate_number = $user_id . time();

        $data = [
            'user_id' => $user_id,
            'form_id' => $form_id,
            'answers' => $answers_serialized,
            'certificate_number' => $certificate_number
        ];

        $format = ['%d', '%d', '%s', '%s'];

        $this->wpdb->replace($this->table_answers, $data, $format);
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
