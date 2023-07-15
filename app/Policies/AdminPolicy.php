<?php

namespace App\Policies;

use App\Models\Admin;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function delete(Admin $loggedInAdmin, Admin $admin) {
        return $loggedInAdmin->id != $admin->id;
    }
}
