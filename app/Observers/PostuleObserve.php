<?php

namespace App\Observers;

use App\Models\Postule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostuleObserve
{

    /**
     * Handle the Postule "deleting" event.
     *
     * @param  \App\Models\Postule  $postule
     * @return void
     */
    public function deleting(Postule $postule){

        Storage::delete($postule->CV);
    }
}
