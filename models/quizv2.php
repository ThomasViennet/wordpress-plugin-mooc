<?php 

namespace Mooc\Models;

class QuizModel {
    private $wpdb;
    private $table_questions;
    private $table_options;

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_questions = $wpdb->prefix . 'mooc_quizzes_questions';
        $this->table_options = $wpdb->prefix . 'mooc_quizzes_options';
    }

    // Ajouter une nouvelle question de quiz
    public function addQuestion($data) {
        $data = $this->sanitizeData($data);
        $this->wpdb->insert($this->table_questions, $data);
        return $this->wpdb->insert_id;
    }

    // Ajouter une nouvelle option de quiz
    public function addOption($data) {
        $data = $this->sanitizeData($data);
        $this->wpdb->insert($this->table_options, $data);
        return $this->wpdb->insert_id;
    }

    // Lire une question spécifique par ID
    public function getQuestion($question_id) {
        $query = $this->wpdb->prepare("SELECT * FROM {$this->table_questions} WHERE id = %d", $question_id);
        return $this->wpdb->get_row($query);
    }

    public function getAllQuestions() {
        return $this->wpdb->get_results("SELECT * FROM {$this->table_questions}");
    }

    // Lire toutes les options pour une question spécifique
    public function getOptions($question_id) {
        $query = $this->wpdb->prepare("SELECT * FROM {$this->table_options} WHERE question_id = %d", $question_id);
        return $this->wpdb->get_results($query);
    }

    // Mettre à jour une question
    public function updateQuestion($question_id, $data) {
        $data = $this->sanitizeData($data);
        return $this->wpdb->update($this->table_questions, $data, array('id' => $question_id));
    }

    // Mettre à jour une option
    public function updateOption($option_id, $data) {
        $data = $this->sanitizeData($data);
        return $this->wpdb->update($this->table_options, $data, array('id' => $option_id));
    }

    // Supprimer une question et ses options associées
    public function deleteQuestion($question_id) {
        $this->wpdb->delete($this->table_options, array('question_id' => $question_id));
        return $this->wpdb->delete($this->table_questions, array('id' => $question_id));
    }

    // Supprimer une option spécifique
    public function deleteOption($option_id) {
        return $this->wpdb->delete($this->table_options, array('id' => $option_id));
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
