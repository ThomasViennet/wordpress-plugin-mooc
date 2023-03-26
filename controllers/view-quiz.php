<?php

/**
 * display quiz based on user_id and quiz_id
 */

namespace Mooc\Controllers\ViewQuiz;

require_once(dirname(__FILE__) . '/../models/quiz.php');
require_once(dirname(__FILE__) . '/../lib/checked.php');

use Mooc\Models\Quiz\Quiz;
use Mooc\Lib\Checked\Checked;

class ViewQuiz
{
    public function execute(int $user_id, int $quiz_id)
    {
        if (!empty($user_id)) {

            $moocFreeSeo = (new Quiz)->get($user_id, $quiz_id);
            $checked = new Checked();
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

            require_once(dirname(__FILE__) . '/../views/chap-1.php');
        } else {

            require_once(dirname(__FILE__) . '/../views/registration.php');
        }
    }
}
