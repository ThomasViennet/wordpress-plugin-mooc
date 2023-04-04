<?php

/**
 * Display quiz based on user_id and quiz_name
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
            require(dirname(__FILE__) . '/../views/quizzes/chap-' . $quiz_name . '.php');
            require(dirname(__FILE__) . '/../views/quizzes/layout-quizzes.php'); //move to each views
        } else {
            require_once(dirname(__FILE__) . '/../views/registration.php');
        }
    }

    public function saveAnswers(int $user_id, int $quiz_id, string $quiz_name, string $quiz_answers)
    {
        require(dirname(__FILE__) . '/../views/quizzes/chap-univers-seo.php'); //Need data like this until CRUD Quiz has done
        $lib_quiz = new Lib_Quiz();
        $note = 0;

        foreach ($questions as $key => $question) {
            foreach ($options as $option) {
                if ($option[1] == $question[0]) {
                    if ($lib_quiz->isCorrectAnswer($option, $quiz_answers[$key], $note) == 'good') {
                        $note++;
                    } elseif ($lib_quiz->isCorrectAnswer($option, $quiz_answers[$key], $note) == 'wrong') {
                        $note--;
                    }

                    //Count the number of correct answers
                    if ($option[4]) {
                        $totalPoints++;
                    }
                }
            }
        }

        //Need to save in data base if user succes the quiz or not to display result whithout check at the end and use ob_
        $percentageCorrectAnswers = $note / $totalPoints;
        if ($percentageCorrectAnswers >= $successIndicator) {
            $alert = 'super';
        } else {
            $alert = 'oups';
        }

        $quiz_status = $alert;
        // $quiz_status = '';
        (new Model_Quiz())->save($user_id, $quiz_id, $quiz_name, $quiz_answers, $quiz_status);

        // $moocFreeSeo = (new Model_Quiz)->get($user_id, $quiz_name);

        // if (!empty($moocFreeSeo)) {

        //     $userAllowedToRespond = FALSE;
        //     $answers = unserialize($moocFreeSeo->quiz_answers);
        // }
    }

    //WIP
    public function answeredQuiz(int $user_id, string $quiz_name)
    {
        // require_once(dirname(__FILE__) . '/../views/dashboard.php');//useless ?
    }
}
