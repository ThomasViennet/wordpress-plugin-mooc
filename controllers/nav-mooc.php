<?php

/**
 * Dashboard of a mooc student
 */

namespace Mooc\Controllers\NavMooc;

require_once(dirname(__FILE__) . '/../models/lesson.php');

use Mooc\Models\Lesson\Lesson;

class NavMooc
{
    public function execute(int $user_id)
    {
        $lesson = (new Lesson())->get_all($user_id);
        require_once(dirname(__FILE__) . '/../views/nav-mooc.php');
    }
}
