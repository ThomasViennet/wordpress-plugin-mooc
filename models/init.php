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

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_quizzes'") != $table_quizzes) {

            $charset_collate = $wpdb->get_charset_collate();

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

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_lessons'") != $table_lessons) {

            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE $table_lessons (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            user_id bigint(20) NOT NULL,
            lesson_id bigint(20) NOT NULL,
            lesson_slug longtext NOT NULL,
            creation_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }
}
