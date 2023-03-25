<?php

/**
 * Registration form
 */

namespace Mooc\Controllers\Registration;

class Registration
{
    public function execute()
    {
        require_once(dirname(__FILE__) . '/../views/registration.php');
    }
}
