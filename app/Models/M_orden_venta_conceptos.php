<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_orden_venta_conceptos extends Model
{
    protected $table = 'orden_venta_conceptos';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'Cantidad',
        'Unidad',
        'Observacion',
        'Precio_unitario',
        'ID_orden_venta',
        'ID_articulo',
    ];

    // Definir la relación con la tabla orden_venta
    public function ordenVenta()
    {
        return $this->belongsTo(M_orden_venta::class, 'ID_orden_venta', 'ID');
    }

    // Definir la relación con la tabla articulo
    public function articulo()
    {
        return $this->belongsTo(M_articulo::class, 'ID_articulo', 'ID');
    }
}
