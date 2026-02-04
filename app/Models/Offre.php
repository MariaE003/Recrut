<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;



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
        'cloturer',
        'user_id'
    ];
    public function recruteur(){
        return $this->belongsTo(User::class,'user_id');
    } 
    public function postulant(){
        return $this->belongsToMany(User::class,'offre_users');
    }
}
