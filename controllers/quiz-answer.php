<?php

namespace Mooc\Controllers;

require_once(dirname(__FILE__) . '/../models/quiz-answer.php');

use Mooc\Models\Model_Answer;

class Controller_Answer
{
    private $answerModel;

    public function __construct()
    {
        $this->answerModel = new Model_Answer();
    }

    public function checkFormSubmission($user_id, $form_id)
    {
        if ($this->answerModel->hasUserSubmittedForm($user_id, $form_id)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
