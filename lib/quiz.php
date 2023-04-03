<?php

/**
 * Check the question that corresponds to the user's answer
 */

namespace Mooc\lib\Quiz;

// require_once(dirname(__FILE__) . '/../models/mooc.php');

// use Mooc\Models\Mooc\MoocFreeSeo;

class Lib_Quiz
{
    public function checkAnswer(string $question, string $answers)
    {
        if ($question == $answers) {
            return TRUE;
        }
    }
}
