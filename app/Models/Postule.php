<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Postule extends Model
{
    use HasFactory;

    protected $fillable=[
        "CV",
        "lettre_de_motivation",
        "user_id",
        "offre_id"
    ];

    public function offre(){
        return $this->belongsTo("App\Models\Offre");
    }

    public function user(){
        return $this->belongsTo("App\Models\User");
    }
}
