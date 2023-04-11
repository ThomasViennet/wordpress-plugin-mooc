<?php

/**
 * Informtions about user
 */

namespace Mooc\Controllers\User;

class Controller_User
{
    public function registration()
    {
        require_once(dirname(__FILE__) . '/../views/registration.php');
    }
}
