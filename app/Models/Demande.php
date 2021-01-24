<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demande extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        "title",
        "slug",
        "duree",
        "ville",
        "type",
        "poste_recherche",
        "user_id"
    ];

    public function user(){
        return $this->belongsTo("App\Models\User");
    }


    /**
     *  Recherche par slug
     */

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
