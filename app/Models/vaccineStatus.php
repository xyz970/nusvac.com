<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vaccineStatus extends Model
{
    use HasFactory;

    protected $table = 'vaccination_status';

    protected $fillable = [
        'id','status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function vacStatus()
    {
        return $this->hasOne(pesertaVaccineStatus::class);
    }
}
