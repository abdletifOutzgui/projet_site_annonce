<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offre extends Model
{
    use HasFactory,SoftDeletes;

    // Fillable propriete
    protected $fillable=[
        "title",
        "type",
        "lieu",
        "fonction",
        "duree",
        "nbr_stagiaires",
        "remuneration",
        "mission",
        "profile_recherche",
        "date_debut",
        "user_id",
        "nbr_vue",
        "slug"
    ];



    public function getCreatedAtAttribute($date){
        return Carbon::parse($date)->format('d-m-Y');
    }

    public function getDateDebutAttribute($date){
        return Carbon::parse($date)->format('d-m-Y');
    }

    public function setDateDebutAttribute($value){
        $this->attributes['date_debut'] = Carbon::parse($value);
    }



    // RelationShip

    public function user(){
        return $this->belongsTo("App\Models\User");
    }

    public function postules(){
        return $this->hasMany("App\Models\Postule");
    }

     /**
     *  Recherche par slug
     */
    public function getRouteKeyName() {
        return 'slug';
    }
}
