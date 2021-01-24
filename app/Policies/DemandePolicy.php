<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Demande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Access\HandlesAuthorization;

class DemandePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Demande  $demande
     * @return mixed
     */
    public function view(User $user)
    {
        return !$user->role;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return !$user->role;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Demande  $demande
     * @return mixed
     */
    public function update(User $user, Demande $demande){

        return $user->id===$demande->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Demande  $demande
     * @return mixed
     */
    public function delete(User $user, Demande $demande){

        return $user->id===$demande->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Demande  $demande
     * @return mixed
     */
    public function restore(User $user, Demande $demande){

        return $user->id===$demande->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Demande  $demande
     * @return mixed
     */
    public function forceDelete(User $user, Demande $demande){
        return $user->id===$demande->user_id;
    }
}
