<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Chercheur;
use App\Models\Offre;
use App\Models\Competence;
use App\Models\Formation;
use App\Models\Experience;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        // 'role',
        'name',
        'email',
        // 'bio',
        'photo',
        'password',
        // 'specialite',
        'lieu'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function sender(){
        return $this->hasMany(Amis::class,'sender_id');
    }
    public function reciever(){
        return $this->hasMany(Amis::class,'reciever_id');
    }

    // 
    public function chercheur(){return $this->hasOne(Chercheur::class);}

    public function experiences(){return $this->hasMany(Experience::class);}

    public function formations(){return $this->hasMany(Formation::class);}

    public function competences(){return $this->hasMany(Competence::class);}

    
    public function createurOffres(){return $this->hasMany(Offre::class,'user_id'); }
    
    public function offresPostule(){return $this->belongsToMany(Offre::class,'offre_users'); }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     * 
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
