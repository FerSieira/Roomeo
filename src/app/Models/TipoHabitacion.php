<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    use HasFactory;

    protected $table = 'tipo_habitaciones';
    protected $primaryKey = 'ID_Tipo_Hab';
    public $incrementing = true;

    protected $fillable = [
        'Nombre_Tipo',
        'Descripcion',
        'Capacidad'
    ];

    public function habitaciones() {
        return $this->hasMany(Habitacion::class, 'ID_Tipo_Hab');
    }
}