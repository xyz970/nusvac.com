<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $table = 'vaccines';
    protected $fillable = [
        'id','brand','details'
    ];

    public function pesertaVaccine()
    {
        return $this->hasOne(PesertaVaccine::class);
    }

    public function stokVaksin()
    {
        return $this->hasOne(Stock::class);
    }
}
