<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;


class Offre extends Model
{
    //
    use HasFactory, Notifiable,HasRoles;

     protected $fillable = [
        'entrepriseName',
        'typeContrat',
        'titre',
        'description',
        'photo',
        'cloture',
        'user_id'
    ];
}
