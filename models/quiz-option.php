<?php

namespace Mooc\Models;

class Model_Option
{
    private $wpdb;
    private $table_options;
    private $table_questions;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_options = $wpdb->prefix . 'mooc_quizzes_options';
        $this->table_questions = $wpdb->prefix . 'mooc_quizzes_questions';
    }

    public function addOption($data)
    {
        $data = $this->sanitizeData($data);
        var_dump($data);
        $this->wpdb->insert($this->table_options, $data);
        return $this->wpdb->insert_id;
    }

    public function getOptions($question_id)
    {
        $query = $this->wpdb->prepare("SELECT * FROM {$this->table_options} WHERE question_id = %d", $question_id);
        return $this->wpdb->get_results($query);
    }

    public function getAllOptions()
    {
        $query = "SELECT o.*, q.question_text FROM {$this->table_options} o 
                  JOIN {$this->table_questions} q ON o.question_id = q.id";
        return $this->wpdb->get_results($query);
    }


    public function updateOption($option_id, $data)
    {
        $data = $this->sanitizeData($data);
        return $this->wpdb->update($this->table_options, $data, array('id' => $option_id));
    }

    public function deleteOption($option_id)
    {
        return $this->wpdb->delete($this->table_options, array('id' => $option_id));
    }

    // Fonctions de validation et de nettoyage des données
    private function sanitizeData($data)
    {
        foreach ($data as $key => $value) {
            if (is_int($value)) {
                $data[$key] = intval($value);
            } else {
                $data[$key] = sanitize_text_field($value);
            }
        }
        return $data;
    }
}
