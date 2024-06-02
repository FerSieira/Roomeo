<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    protected $primaryKey = 'ID_Servicio';
    protected $fillable = ['Nombre', 'Descripcion', 'Activo', 'Precio'];

    public function reservas() {
        return $this->belongsToMany(Reserva::class, 'reserva_servicios', 'ID_Servicio', 'ID_Reserva')
                    ->withPivot('ID_Empleado', 'Dia_Hora');
    }
}
