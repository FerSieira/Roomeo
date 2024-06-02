<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';
    protected $primaryKey = 'ID_Reservas';
    public $incrementing = true;
    protected $fillable = [
        'Fecha_Llegada', 'Fecha_Salida', 'Adultos', 'Ninos', 'Solicitudes', 'Estado', 'hora_entra', 'hora_sale', 
        'ID_Tipo_Hab', 'ID_Cliente', 'ID_Habitacion', 'ID_Tarifa'
    ];

    protected $dates = ['Fecha_Llegada', 'Fecha_Salida'];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }

    public function tipoHabitacion() {
        return $this->belongsTo(TipoHabitacion::class, 'ID_Tipo_Hab');
    }

    public function habitacion() {
        return $this->belongsTo(Habitacion::class, 'ID_Habitacion');
    }

    public function tarifa() {
        return $this->belongsTo(Tarifa::class, 'ID_Tarifa');
    }

    public function factura() {
        return $this->hasOne(Factura::class, 'ID_Reserva');
    }

    public function acompanantes() {
    return $this->belongsToMany(Acompanante::class, 'reserva_acompanante', 'ID_Reserva', 'ID_Acompanante');
    }



    public function servicios() {
        return $this->belongsToMany(Servicio::class, 'reserva_servicios', 'ID_Reserva', 'ID_Servicio')
                    ->withPivot('ID_Empleado', 'Dia_Hora');
    }
}
