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
    public function checkAnswer(array $option, $answers)
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

    public function isCorrectAnswer(array $option, $answers)
    {
        
        if (gettype($answers) == 'array') {

            // Get correct answer
            foreach ($option as $option) {
                

                if($option[4]) {//If correct answer
                    
                }
            }

            
        } elseif (gettype($answers) == 'string') {
            if ($option == $answers) {
                return TRUE;
            }
        }
    }
}
