<?php

namespace Mooc\Models;

class Model_Option
{
    private $wpdb;
    private $table_options;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_options = $wpdb->prefix . 'mooc_quizzes_options';
    }

    public function addOption($data)
    {
        $data = $this->sanitizeData($data);

        // Code de débogage
        echo 'Tentative d\'ajout d\'option avec question_id: ' . $data['question_id'];

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
        return $this->wpdb->get_results("SELECT * FROM {$this->table_options}");
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
