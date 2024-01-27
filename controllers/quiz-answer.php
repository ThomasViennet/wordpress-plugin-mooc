<?php

namespace Mooc\Controllers;

require_once(dirname(__FILE__) . '/../models/quiz-answer.php');
require_once(dirname(__FILE__) . '/../models/quiz-option.php');

use Mooc\Models\Model_Answer;
use Mooc\Models\Model_Option;

class Controller_Answer
{
    private $answerModel;
    private $optionModel;

    public function __construct()
    {
        $this->answerModel = new Model_Answer();
        $this->optionModel = new Model_Option();
    }

    public function checkFormSubmission($user_id, $form_id)
    {
        $userAnswers = $this->answerModel->getUserFormAnswers($user_id, $form_id);
        if ($userAnswers === false) {//$userAnswers can be an array if it's not false
            return false;
        } else{
            return true;
        }
    }

    public function evaluateUserAnswers($user_id, $form_id)
    {
        $userAnswers = $this->answerModel->getUserFormAnswers($user_id, $form_id);
        if (!$userAnswers) {
            return false; // No answers found
        }

        $correctAnswers = 0;
        foreach ($userAnswers as $questionId => $userAnswerId) {
            $options = $this->optionModel->getOptions($questionId);
            foreach ($options as $option) {
                if ($option->id == $userAnswerId && $option->is_correct) {
                    $correctAnswers++;
                    break;
                }
            }
        }

        $totalCorrectAnswers = $this->optionModel->countCorrectAnswersByFormId($form_id);
        $minimumScore = 80;
        $note = ($correctAnswers * 100) / $totalCorrectAnswers;
        if ($minimumScore <= $note) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function resetUserAnswers($user_id, $form_id)
    {
        $this->answerModel->deleteUserFormAnswers($user_id, $form_id);
    }
}
