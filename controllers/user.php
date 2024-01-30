<?php

namespace Mooc\Controllers;

require_once(dirname(__FILE__) . '/../models/user.php');
require_once(dirname(__FILE__) . '/quiz-certificate.php');

use Mooc\Controllers\Controller_Certificate; //déplacer ce controller dans /lib
use Mooc\Models\Model_User;

class Controller_User
{
    private $userModel;
    private $certificateController;

    public function __construct()
    {
        $this->userModel = new Model_User();
        $this->certificateController = new Controller_Certificate();
    }

    public function displayUserProfile($user_id)
    {
        $userData = $this->userModel->getUserData($user_id);
        if ($userData) {
            $certificateController = new Controller_Certificate();//to be improved to use a loop that checks all the forms
            include(dirname(__FILE__) . '/../views/front/user.php');
        } else {
            echo "<p>Profil utilisateur non trouvé.</p>";
        }
    }
}
