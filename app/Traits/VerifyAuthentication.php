<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait VerifyAuthentication
{

    public function canAccessClient($access, $accessor)
    {
        return in_array($access, $accessor);
    }

    public function canAccessAdmin($access, $accessor)
    {
        return in_array($access, $accessor);
    }
}