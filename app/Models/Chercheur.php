<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;

class Chercheur extends Model
{
    
    use HasFactory, Notifiable,HasRoles;

     protected $fillable = [
         'titre',
         'bio',
         'user_id',
    ];
}
