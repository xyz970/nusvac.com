<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class AdminsVaccineCenter extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $table = 'admins_vac_center';

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

    public function isAdminVac()
    {
        if ($this->role == "AdminVaccineCenter") {
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
