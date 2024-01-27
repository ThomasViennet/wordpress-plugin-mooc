<?php 

namespace Mooc\Models;

class Model_Form {
    private $wpdb;
    private $table_forms;
    private $table_questions;

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_forms = $wpdb->prefix . 'mooc_quizzes_forms';
        $this->table_questions = $wpdb->prefix . 'mooc_quizzes_questions';
    }

    public function addForm($data) {
        $data = $this->sanitizeData($data);
        $this->wpdb->insert($this->table_forms, $data);
        return $this->wpdb->insert_id;
    }

    public function getForm($form_id) {
        $query = $this->wpdb->prepare("SELECT * FROM {$this->table_forms} WHERE id = %d", $form_id);
        return $this->wpdb->get_row($query);
    }

    public function getAllForms() {
        return $this->wpdb->get_results("SELECT * FROM {$this->table_forms}");
    }

    public function updateForm($form_id, $data) {
        $data = $this->sanitizeData($data);
        return $this->wpdb->update($this->table_forms, $data, array('id' => $form_id));
    }

    public function deleteForm($form_id) {
        $this->wpdb->delete($this->table_questions, array('form_id' => $form_id));
        return $this->wpdb->delete($this->table_forms, array('id' => $form_id));
    }

    // Data validation and cleansing functions
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
