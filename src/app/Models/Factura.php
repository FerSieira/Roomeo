<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $primaryKey = 'ID_Factura';
    public $incrementing = true;
    protected $fillable = ['ID_Reserva', 'Cant_Pago', 'Metodo_Pago', 'Fecha_Pago'];

    public function reserva() {
        return $this->belongsTo(Reserva::class, 'ID_Reserva');
    }
}
