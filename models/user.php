<?php

namespace Mooc\Models;

class Model_User
{
    public function getUserData($user_id)
    {
        $user = get_userdata($user_id);
        if ($user) {
            return [
                'prenom' => $user->first_name ?: 'Non défini',
                'nom' => $user->last_name ?: 'Non défini',
                'bio' => $user->description ?: 'Non défini',
                'site_web' => $user->user_url ?: 'Non défini'
            ];
        } else {
            return null;
        }
    }
}
