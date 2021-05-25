<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admins extends Authenticable implements JWTSubject
{
    use HasFactory,Notifiable;
    
    protected $table = 'admins';

    protected $primaryKey = 'id';
    protected $fillable = [
        'username','password','first_name','last_name'
    ];
    protected $hidden = [
        'password',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name." ".$this->last_name;
    }

    public function isSuperAdmin()
    {
        if ($this->role == "SuperAdmin") {
            return true;
        } else {
            return false;
        }
        
    }

    public function getJWTIdentifier()
    {
       return $this->getKey(); 
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
