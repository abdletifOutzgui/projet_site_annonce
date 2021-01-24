<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id",
        "destinataire_id",
        "message",
        "title"
    ];

    public function user(){
        return $this->belongsTo("App\Models\User");
    }

    public function getDestinataire(){
        return User::whereKey($this->destinataire_id)->first();
    }
}
