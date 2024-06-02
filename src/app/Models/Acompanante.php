<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acompanante extends Model
{
    use HasFactory;

    protected $table = 'acompanantes';
    protected $primaryKey = 'ID_Acompanante';
    public $incrementing = true;
    protected $fillable = [
        'Nombre', 'Apellidos', 'Codigo_Postal', 'DNI', 'fecha_nac', 'nacionalidad', 'direccion', 'pais', 'ciudad'
    ];

    public function reservas()
    {
        return $this->belongsToMany(Reserva::class, 'reserva_acompanante', 'ID_Acompanante', 'ID_Reserva');
    }

}
