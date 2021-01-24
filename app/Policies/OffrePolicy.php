<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Offre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Access\HandlesAuthorization;

class OffrePolicy
{
    use HandlesAuthorization;

    public function message(User $user,Offre $offre){
        return $user->id!==$offre->user_id && !$user->role;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Offre  $offre
     * @return mixed
     */
    public function view(User $user, Offre $offre)
    {
        return $user->id===$offre->user_id && $user->role;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Offre  $offre
     * @return mixed
     */
    public function update(User $user, Offre $offre)
    {
        return $user->id===$offre->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Offre  $offre
     * @return mixed
     */
    public function delete(User $user, Offre $offre)
    {
        return $user->id===$offre->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Offre  $offre
     * @return mixed
     */
    public function restore(User $user, Offre $offre)
    {
        return $user->id===$offre->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Offre  $offre
     * @return mixed
     */
    public function forceDelete(User $user, Offre $offre)
    {
        return $user->id===$offre->user_id;
    }
}
