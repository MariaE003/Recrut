<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    
    use HasFactory, Notifiable,HasRoles;

     protected $fillable = [
         'titre',
         'user_id',
    ];
}
