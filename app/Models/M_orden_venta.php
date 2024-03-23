<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_orden_venta extends Model
{
    protected $table = 'orden_venta';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'Folio',
        'Titulo',
        'Fecha_creacion',
        'Enviado_a_prod',
        'ID_sucursal',
        'ID_usuario',
        'ID_cliente'
    ];

    // Definir la relación con la tabla sucursales
    public function sucursal()
    {
        return $this->belongsTo(M_sucursales::class, 'ID_sucursal', 'ID');
    }

    // Definir la relación con la tabla usuario
    public function usuario()
    {
        return $this->belongsTo(M_usuario::class, 'ID_usuario', 'ID');
    }

    // Definir la relación con la tabla cliente
    public function cliente()
    {
        return $this->belongsTo(M_cliente::class, 'ID_cliente', 'ID');
    }
}
