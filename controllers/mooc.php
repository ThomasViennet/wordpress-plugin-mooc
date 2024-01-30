<?php

/**
 * Mooc
 */

namespace Mooc\Controllers;

class Controller_Mooc
{
    public static function displayRegistrationForm()
    {
        require_once(dirname(__FILE__) . '/../views/registration.php');
    }

}
