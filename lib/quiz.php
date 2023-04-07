<?php

/**
 * Check the question that corresponds to the user's answer
 */

namespace Mooc\lib\Quiz;

// require_once(dirname(__FILE__) . '/../models/mooc.php');

// use Mooc\Models\Mooc\MoocFreeSeo;

class Lib_Quiz
{
    //$answers can be a string or an array
    public function isChecked(array $option, $answers)
    {
        if (gettype($answers) == 'array') {
            foreach ($answers as $answer) {
                if ($option[0] == stripslashes($answer)) {
                    return TRUE;
                    break;
                }
            }
        } elseif (gettype($answers) == 'string') {
            if ($option[0] == stripslashes($answers)) {
                return TRUE;
            }
        }
    }

    public function isCorrectAnswer(array $option, $answers): bool
    {
        $result = FALSE;

        if (gettype($answers) == 'array') {

            foreach ($answers as $answer) {
                if ($option[0] == stripslashes($answer)) {
                    if ($option[4]) { //$option[4] = If this is the correct answer
                        $result = TRUE;
                    } else {
                        $result = FALSE;
                    }
                    break;
                }
            }
        } elseif (gettype($answers) == 'string') {
            if ($option[0] == stripslashes($answers)) {
                $result = TRUE;
            } else {
                $result = FALSE;
            }
        }

        return $result;
    }
}
