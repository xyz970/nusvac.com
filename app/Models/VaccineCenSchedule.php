<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineCenSchedule extends Model
{
    use HasFactory;

    protected $table = 'vac_center_schedule';

    protected $fillable = [
        'vac_center_id','schedule_id'
    ];

    /**
     * Relasi dari Schedule.id
     */
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }


    public function vacCenter()
    {
        return $this->belongsTo(VaccineCenter::class);
    }
}
