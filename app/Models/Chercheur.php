<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Chercheur extends Model
{
    
    use HasFactory, Notifiable,HasRoles;

     protected $fillable = [
         'titre',
         'bio',
         'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
