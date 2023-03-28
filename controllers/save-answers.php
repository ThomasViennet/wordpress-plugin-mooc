<?php

/**
 * Save the user's answers
 */

namespace Mooc\Controllers\SaveAnswers;

require_once(dirname(__FILE__) . '/../models/quiz.php');

use Mooc\Models\Quiz\Quiz;

class SaveAnswers
{
    public function execute(int $user_id, int $quiz_id, string $quiz_answers)
    {
        (new Quiz())->save($user_id, $quiz_id, $quiz_answers);
    }
}
