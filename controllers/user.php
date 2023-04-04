<?php

/**
 * Informtions about user
 */

namespace Mooc\Controllers\User;

require_once(dirname(__FILE__) . '/../models/quiz.php');
require_once(dirname(__FILE__) . '/../lib/quiz.php');

use Mooc\Models\Quiz\Model_Quiz;
use Mooc\Lib\Quiz\Lib_Quiz;

class Controller_User
{
    //Kknow if user has already answered to this quiz
    public function answeredQuiz(int $user_id, string $quiz_name)
    {
        require_once(dirname(__FILE__) . '/../views/dashboard.php');
    }
}
