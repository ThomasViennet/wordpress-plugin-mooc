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
                if ($option[0] == $answer) {
                    return TRUE;
                    break;
                }
            }
        } elseif (gettype($answers) == 'string') {
            if ($option[0] == $answers) {
                return TRUE;
            }
        }
    }

    public function isCorrectAnswer(array $option, $answers, int $note)
    {
        if ($option[4]) { //If this is the correct answer
            if (gettype($answers) == 'array') {

                foreach ($answers as $answer) {
                    if ($option[0] == $answer) {
                        return 'good';
                        break;
                    }
                }
            } elseif (gettype($answers) == 'string') {
                if ($option[0] == $answers) {
                    return 'good';
                }
            }
        } else {
            if (gettype($answers) == 'array') {

                foreach ($answers as $answer) {
                    if ($option[0] == $answer) {
                        return 'wrong';
                        break;
                    }
                }
            } elseif (gettype($answers) == 'string') {
                if ($option[0] == $answers) {
                    return FALSE;// wrong ?
                }
            }
        }
    }
}
