<?php 

namespace Mooc\Models;

class Model_Question {
    private $wpdb;
    private $table_questions;
    private $table_options;

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_questions = $wpdb->prefix . 'mooc_quizzes_questions';
        $this->table_options = $wpdb->prefix . 'mooc_quizzes_options';
    }

    public function addQuestion($data) {
        $data = $this->sanitizeData($data);
        $this->wpdb->insert($this->table_questions, $data);
        return $this->wpdb->insert_id;
    }

    public function getQuestion($question_id) {
        $query = $this->wpdb->prepare("SELECT * FROM {$this->table_questions} WHERE id = %d", $question_id);
        return $this->wpdb->get_row($query);
    }

    public function getAllQuestions() {
        return $this->wpdb->get_results("SELECT * FROM {$this->table_questions}");
    }

    public function updateQuestion($question_id, $data) {
        $data = $this->sanitizeData($data);
        return $this->wpdb->update($this->table_questions, $data, array('id' => $question_id));
    }

    public function deleteQuestion($question_id) {
        $this->wpdb->delete($this->table_options, array('question_id' => $question_id));
        return $this->wpdb->delete($this->table_questions, array('id' => $question_id));
    }

    // Fonctions de validation et de nettoyage des données
    private function sanitizeData($data) {
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
