<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'ID_Cliente';
    public $incrementing = true;
    protected $fillable = [
        'Pais', 'Nombre', 'Apellidos', 'DNI', 'Nacionalidad', 'Telefono', 'Fecha_nacimiento', 
        'Email', 'Direccion', 'Codigo_Postal', 'Ciudad', 'Tarjeta_Cred'
    ];

    protected $hidden = ['Tarjeta_Cred'];

    public function reservas() {
        return $this->hasMany(Reserva::class, 'ID_Cliente');
    }
}

