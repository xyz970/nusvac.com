<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaVaccine extends Model
{
    use HasFactory;

    protected $table = 'peserta_vaccines';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vaccines_id','peserta_nik'
    ];
    // protected $primaryKey = 'peserta_id';


    /**
     * Relasi dari peserta.nik
     */
    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class,'vaccines_id');
    }

}
