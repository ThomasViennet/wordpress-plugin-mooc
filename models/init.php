<?php

/**
 * Create a table in the database to record student progress
 */

namespace Mooc\Models\Init;

class Model_Init
{
    public function createTables()
    {
        global $wpdb;

        $table_quizzes = $wpdb->prefix . 'quizzes';
        $table_lessons = $wpdb->prefix . 'lessons';
        $table_quizzes_questions = $wpdb->prefix . 'mooc_quizzes_questions';
        $table_quizzes_options = $wpdb->prefix . 'mooc_quizzes_options';

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_quizzes'") != $table_quizzes) {

            $charset_collate = $wpdb->get_charset_collate();
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            $sql = "CREATE TABLE $table_quizzes (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            user_id bigint(20) NOT NULL,
            quiz_id bigint(20) NOT NULL,
            quiz_name longtext NOT NULL,
            quiz_answers longtext NOT NULL,
            quiz_status longtext NOT NULL,
            creation_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY  (id)
            ) $charset_collate;";
            dbDelta($sql);
        }

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_lessons'") != $table_lessons) {

            $charset_collate = $wpdb->get_charset_collate();
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            $sql = "CREATE TABLE $table_lessons (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            user_id bigint(20) NOT NULL,
            lesson_id bigint(20) NOT NULL,
            lesson_slug longtext NOT NULL,
            creation_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY  (id)
            ) $charset_collate;";
            dbDelta($sql);
        }

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_quizzes_questions'") != $table_quizzes_questions) {

            $charset_collate = $wpdb->get_charset_collate();
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            $sql_quizzes_questions = "CREATE TABLE $table_quizzes_questions (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            quiz_id bigint(20) NOT NULL,
            user_id bigint(20) NOT NULL,
            question_text text NOT NULL,
            status_update_date datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY  (id)
            ) $charset_collate;";
            dbDelta($sql_quizzes_questions);
        }

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_quizzes_options'") != $table_quizzes_options) {
            $charset_collate = $wpdb->get_charset_collate();
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            $sql_quizzes_options = "CREATE TABLE $table_quizzes_options (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            question_id mediumint(9) NOT NULL,
            option_text text NOT NULL,
            is_correct boolean NOT NULL,
            PRIMARY KEY  (id),
            FOREIGN KEY (question_id) REFERENCES $table_quizzes_questions(id) ON DELETE CASCADE
            ) $charset_collate;";
            dbDelta($sql_quizzes_options);
        }
    }
}
