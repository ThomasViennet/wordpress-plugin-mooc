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
        if ($option[4]) { //If this is the correct answer
            if (gettype($answers) == 'array') {

                foreach ($answers as $answer) {
                    if ($option[0] == stripslashes($answer)) {
                        return TRUE;
                        break;
                    } else {
                        return FALSE;
                    }
                }
            } elseif (gettype($answers) == 'string') {
                if ($option[0] == stripslashes($answers)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        } else {
            if (gettype($answers) == 'array') {

                foreach ($answers as $answer) {
                    if ($option[0] == stripslashes($answer)) {
                        return FALSE;
                        break;
                    } else {
                        return TRUE;
                    }
                }
            } elseif (gettype($answers) == 'string') {
                if ($option[0] == stripslashes($answers)) {
                    return FALSE;
                } else {
                    return TRUE;
                }
            }
        }
    }
}
