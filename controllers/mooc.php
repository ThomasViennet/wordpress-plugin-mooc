<?php

/**
 * Mooc
 */

namespace Mooc\Controllers\Mooc;

class Controller_Mooc
{
    public static function displayRegistrationForm()
    {
        require_once(dirname(__FILE__) . '/../views/registration.php');
    }

}
