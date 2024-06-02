<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;

    protected $table = 'tarifas';
    protected $primaryKey = 'ID_Tarifa';
    public $incrementing = true;
    protected $fillable = ['DescripcionTar', 'Desde', 'Hasta', 'Precio', 'Ocupacion'];

    public function reservas() {
        return $this->hasMany(Reserva::class, 'ID_Tarifa');
    }
}
