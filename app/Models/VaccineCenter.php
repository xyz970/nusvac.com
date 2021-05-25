<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineCenter extends Model
{
    use HasFactory;
    protected $table = 'vac_center';
    protected $fillable = [
        'id','name','address','contact'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'id';

    public function vacCenterSchedule()
    {
        return $this->hasOne(VaccineCenSchedule::class);
    }

    public function vacCenterPeserta()
    {
        return $this->hasOne(Peserta::class);
    }

    public function vacCenterStok()
    {
        return $this->hasOne(Stock::class);
    }
    
}
