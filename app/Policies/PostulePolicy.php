<?php

namespace App\Policies;

use App\Models\Postule;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Postule  $postule
     * @return mixed
     */
    public function update(User $user, Postule $postule)
    {
        return $user->id===$postule->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Postule  $postule
     * @return mixed
     */
    public function delete(User $user, Postule $postule)
    {
        return $user->id===$postule->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Postule  $postule
     * @return mixed
     */
    public function restore(User $user, Postule $postule)
    {
        return $user->id===$postule->user_id;
    }
}
