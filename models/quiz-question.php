<?php

namespace Mooc\Models;

class Model_Question
{
    private $wpdb;
    private $table_forms;
    private $table_questions;
    private $table_options;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_forms = $wpdb->prefix . 'mooc_quizzes_forms';
        $this->table_questions = $wpdb->prefix . 'mooc_quizzes_questions';
        $this->table_options = $wpdb->prefix . 'mooc_quizzes_options';
    }

    public function addQuestion($data)
    {
        $data = $this->sanitizeData($data);
        $this->wpdb->insert($this->table_questions, $data);
        return $this->wpdb->insert_id;
    }

    public function getQuestion($question_id)
    {
        $query = $this->wpdb->prepare("SELECT * FROM {$this->table_questions} WHERE id = %d", $question_id);
        return $this->wpdb->get_row($query);
    }

    public function getAllQuestions()
    {
        $query = "SELECT q.*, f.form_name FROM {$this->table_questions} q 
                  JOIN {$this->table_forms} f ON q.form_id = f.id";
        return $this->wpdb->get_results($query);
    }

    public function getQuestionsByFormId($form_id)
    {
        $query = $this->wpdb->prepare(
            "SELECT * FROM {$this->table_questions} WHERE form_id = %d",
            $form_id
        );
        return $this->wpdb->get_results($query);
    }

    // public function getRandomQuestionsByFormId($form_id, $limit = 80)
    // {
    //     $query = $this->wpdb->prepare(
    //         "SELECT * FROM {$this->table_questions} WHERE form_id = %d ORDER BY RAND() LIMIT %d",
    //         $form_id,
    //         $limit
    //     );
    //     return $this->wpdb->get_results($query);
    // }

    public function getRandomQuestionsByFormId($form_id, $limit = 80)
    {
        // Select the questions that should always be included
        $alwaysIncludeQuestions = $this->wpdb->get_results($this->wpdb->prepare(
            "SELECT * FROM {$this->table_questions} WHERE form_id = %d AND always_include = 1",
            $form_id
        ));

        $numberOfAlwaysIncludeQuestions = count($alwaysIncludeQuestions);

        // Adjust the number of random questions to be selected according to the number of questions to be systematically included.
        $randomLimit = max($limit - $numberOfAlwaysIncludeQuestions, 0);

        // Select the remaining questions at random, if necessary
        $randomQuestions = [];
        if ($randomLimit > 0) {
            $randomQuestions = $this->wpdb->get_results($this->wpdb->prepare(
                "SELECT * FROM {$this->table_questions} WHERE form_id = %d AND always_include = 0 ORDER BY RAND() LIMIT %d",
                $form_id,
                $randomLimit
            ));
        }

        $questions = array_merge($alwaysIncludeQuestions, $randomQuestions);

        return $questions;
    }


    public function updateQuestion($question_id, $data)
    {
        $data = $this->sanitizeData($data);
        return $this->wpdb->update($this->table_questions, $data, array('id' => $question_id));
    }

    public function deleteQuestion($question_id)
    {
        $this->wpdb->delete($this->table_options, array('question_id' => $question_id));
        return $this->wpdb->delete($this->table_questions, array('id' => $question_id));
    }

    // Data validation and cleansing functions
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
