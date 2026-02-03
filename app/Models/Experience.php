<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;


class Experience extends Model
{
    
    use HasFactory, Notifiable,HasRoles;

     protected $fillable = [
        'poste',
        'entreprise',
        'duree',
        'user_id',
    ];
}
