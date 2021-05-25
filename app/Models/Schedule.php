<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedule';
    protected $fillable = [
        'date','time'
    ];


    /**
     * Relasi untuk VaccineCenSchedule.schedule_id
     */
    public function vaccineCenterSchedule()
    {
       return $this->belongsTo('App\Models\VaccineCenSchedule','schedule_id');
    }
}
