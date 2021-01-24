<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get Name on Uppercase
     */

     public function getNameAttribute($name){
         return $attributes['name'] = strtoupper($name);
     }

     /**
     * Get Name on Uppercase
     */

    public function getFullNameAttribute(){
        return strtoupper($this->name). ' '.strtoupper($this->last_name) ;
    }



    /**
        User can create many offres
    */
    public function offres(){
        return $this->hasMany("App\Models\Offre");
    }
     /**
        User can postule to many offres
    */
    public function postules(){
        return $this->hasMany("App\Models\Postule");
    }

    /**
     * User has One profile
     */
    public function profile(){
        return $this->hasOne("App\Models\Profile");
    }

    /**
     * User Can create many demandes
     */
    public function demandes(){
        return $this->hasMany("App\Models\Demande");
    }
    /**
        User can send many messages
    */
    public function messages(){
        return $this->hasMany("App\Models\Message");
    }
}
