<?php

/**
 * Dashboard of a mooc student
 */

namespace Mooc\Controllers\Dashboard;

class Dashboard
{
    public function execute(int $user_id)
    {
        require_once(dirname(__FILE__) . '/../views/dashboard.php');
    }
}
