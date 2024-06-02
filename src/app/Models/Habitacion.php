<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    protected $table = 'habitaciones';
    protected $primaryKey = 'ID_Habitacion';
    public $incrementing = true;
    protected $fillable = ['Num_hab', 'Planta', 'Estado', 'ID_Tipo_Hab'];

    public function tipoHabitacion() {
        return $this->belongsTo(TipoHabitacion::class, 'ID_Tipo_Hab');
    }

    public function reservas() {
        return $this->hasMany(Reserva::class, 'ID_Habitacion');
    }
}
