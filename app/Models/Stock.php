<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stock';
    protected $fillable = [
        'vac_center_id','vaccines_id','stock'
    ];

    public function vacCenter()
    {
        return $this->belongsTo(VaccineCenter::class);
    }


    public function vaksin()
    {
        return $this->belongsTo(Vaccine::class,'vaccines_id');
    }
}
