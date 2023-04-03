<?php

/**
 * display quiz based on user_id and quiz_name
 * Use quiz_id when CRUD for quizzes will be ready
 */

namespace Mooc\Controllers\Quiz;

require_once(dirname(__FILE__) . '/../models/quiz.php');
require_once(dirname(__FILE__) . '/../lib/quiz.php');

use Mooc\Models\Quiz\Model_Quiz;
use Mooc\Lib\Quiz\Lib_Quiz;

class Controller_Quiz
{
    public function viewQuiz(int $user_id, string $quiz_name)
    {
        if (!empty($user_id)) {

            $moocFreeSeo = (new Model_Quiz)->get($user_id, $quiz_name);
            $lib_quiz = new Lib_Quiz();
            $note = 0;

            if (!empty($moocFreeSeo)) {

                $userAllowedToRespond = FALSE;
                $answers = unserialize($moocFreeSeo->quiz_answers);

                if ($answers['0'] == 'europe') {
                    $note++;
                }
            } else {
                $userAllowedToRespond = TRUE;
                $answers = ['null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'];
            }
            require_once(dirname(__FILE__) . '/../views/quizzes/chap-' . $quiz_name . '.php');
        } else {
            require_once(dirname(__FILE__) . '/../views/registration.php');
        }
    }

    public function saveAnswers(int $user_id, int $quiz_id, string $quiz_name,string $quiz_answers)
    {
        // $checked = new Lib_Checked();
        (new Model_Quiz())->save($user_id, $quiz_id, $quiz_name,$quiz_answers);
        // require_once(dirname(__FILE__) . '/../views/quizzes/chap-' . $quiz_name . '.php');
    }

    //WIP
    public function answeredQuiz(int $user_id, string $quiz_name)
    {
        // require_once(dirname(__FILE__) . '/../views/dashboard.php');//useless ?
    }
}
