<?php

namespace App\Observers;

use App\Models\Profile;

class ProfileObserve
{
    /**
     * Handle the Profile "deleting" event.
     *
     * @param  \App\Models\Profile  $profile
     * @return void
     */
    public function deleting(Profile $profile)
    {
        $profile->user->delete();
    }
}
