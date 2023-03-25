<?php

/**
 * Check the question that corresponds to the user's answer
 */

namespace Mooc\lib\Checked;

// require_once(dirname(__FILE__) . '/../models/mooc.php');

// use Mooc\Models\Mooc\MoocFreeSeo;

class Checked
{
    public function execute(string $question, string $answers)
    {
        if ($question == $answers) {
            return TRUE;
        }
    }
}
