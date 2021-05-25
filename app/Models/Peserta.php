<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
// use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Peserta extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $table = 'peserta';

    protected $fillable = [
        'first_name',
        'last_name',
        'nik',
        'dob',
        'address',
        'contact',
        'age',
        'password'
    ];
    protected $hidden = [
        'id',
        'role',
        'password',
        'created_at',
        'updated_at',
        'vac_center_id'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }



    /**
     * Relasi Vaccine center.id
     */
    public function vacCenter()
    {
        return $this->belongsTo(VaccineCenter::class);
    }


    /**
     * Relasi untuk Peserta Vaccine.peserta_nik
     */
    public function pesertaVaccine()
    {
        return $this->hasOne(PesertaVaccine::class);
    }


    public function pesertaVacStatus()
    {
       return $this->hasOne(pesertaVaccineStatus::class);
    }


    

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function isPeserta()
    {
        if ($this->role == "peserta") {
            return true;
        } else {
            return false;
        }
        
    }

    public function getFullNameAttribute()
    {
        return $this->first_name." ".$this->last_name;
    }

}
