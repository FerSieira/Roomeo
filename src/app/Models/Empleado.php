<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Empleado extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'empleados';
    protected $primaryKey = 'ID_Empleado';
    protected $fillable = [
        'Nombre',
        'Apellidos',
        'Departamento',
        'Usuario',
        'Contraseña',
        'Telefono',
        'Email',
        'Rol',
    ];

    protected $hidden = [
        'Contraseña',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->Contraseña;
    }
}