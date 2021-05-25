<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesertaVaccineStatus extends Model
{
    use HasFactory;

    protected $table = 'peserta_vaccination_status';
    protected $primaryKey = 'id';
    protected $fillable = [
        'peserta_id','vaccination_status_id'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function vaccinationStatus()
    {
        return $this->belongsTo(vaccineStatus::class);
    }
    
}
