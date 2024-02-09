<?php

/**
 * Create a table in the database to record student progress
 */

namespace Mooc\Models;

class Model_Init
{
    public function createTables()
    {
        global $wpdb;

        $table_quizzes = $wpdb->prefix . 'quizzes';
        $table_lessons = $wpdb->prefix . 'lessons';
        $table_quizzes_forms = $wpdb->prefix . 'mooc_quizzes_forms';
        $table_quizzes_questions = $wpdb->prefix . 'mooc_quizzes_questions';
        $table_quizzes_options = $wpdb->prefix . 'mooc_quizzes_options';
        $table_quizzes_answers = $wpdb->prefix . 'mooc_quizzes_answers';

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_quizzes'") != $table_quizzes) {

            $charset_collate = $wpdb->get_charset_collate();
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            $sql_quizzes = "CREATE TABLE $table_quizzes (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            user_id bigint(20) NOT NULL,
            quiz_id bigint(20) NOT NULL,
            quiz_name longtext NOT NULL,
            quiz_answers longtext NOT NULL,
            quiz_status longtext NOT NULL,
            creation_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY  (id)
            ) $charset_collate;";
            dbDelta($sql_quizzes);
        }

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_lessons'") != $table_lessons) {

            $charset_collate = $wpdb->get_charset_collate();
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            $sql_lessons = "CREATE TABLE $table_lessons (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            user_id bigint(20) NOT NULL,
            lesson_id bigint(20) NOT NULL,
            lesson_slug longtext NOT NULL,
            creation_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY  (id)
            ) $charset_collate;";
            dbDelta($sql_lessons);
        }

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_quizzes_forms'") != $table_quizzes_forms) {

            $charset_collate = $wpdb->get_charset_collate();
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            $sql_forms = "CREATE TABLE $table_quizzes_forms (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            form_name text NOT NULL,
            PRIMARY KEY  (id)
            ) $charset_collate;";
            dbDelta($sql_forms);
        }

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_quizzes_questions'") != $table_quizzes_questions) {

            $charset_collate = $wpdb->get_charset_collate();
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            $sql_questions = "CREATE TABLE $table_quizzes_questions (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            form_id mediumint(9) NOT NULL,
            question_text text NOT NULL,
            source_question text DEFAULT NULL,
            always_include TINYINT(1) NOT NULL DEFAULT '0',
            PRIMARY KEY  (id),
            FOREIGN KEY (form_id) REFERENCES $table_quizzes_forms(id) ON DELETE CASCADE
            ) $charset_collate;";
            dbDelta($sql_questions);
        }

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_quizzes_options'") != $table_quizzes_options) {
            $charset_collate = $wpdb->get_charset_collate();
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            $sql_options = "CREATE TABLE $table_quizzes_options (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            question_id mediumint(9) NOT NULL,
            option_text text NOT NULL,
            is_correct boolean NOT NULL,
            PRIMARY KEY  (id),
            FOREIGN KEY (question_id) REFERENCES $table_quizzes_questions(id) ON DELETE CASCADE
            ) $charset_collate;";
            dbDelta($sql_options);
        }


        if ($wpdb->get_var("SHOW TABLES LIKE '$table_quizzes_answers'") != $table_quizzes_answers) {
            $charset_collate = $wpdb->get_charset_collate();
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            $sql_answers = "CREATE TABLE $table_quizzes_answers (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                user_id mediumint(9) NOT NULL,
                form_id mediumint(9) NOT NULL,
                answers text NOT NULL,
                form_submitted datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
                certificate_number VARCHAR(255) NOT NULL,
                PRIMARY KEY  (id)
            ) $charset_collate;";
            dbDelta($sql_answers);
        }
    }
}
