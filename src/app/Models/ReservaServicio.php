<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaServicio extends Model
{
    use HasFactory;

    protected $table = 'reserva_servicios';
    protected $primaryKey = 'ID_RS';
    protected $fillable = ['ID_Reserva', 'ID_Servicio', 'ID_Empleado', 'Dia_Hora'];

    public function reserva() {
        return $this->belongsTo(Reserva::class, 'ID_Reserva');
    }

    public function servicio() {
        return $this->belongsTo(Servicio::class, 'ID_Servicio');
    }

    public function empleado() {
        return $this->belongsTo(Empleado::class, 'ID_Empleado');
    }
}
