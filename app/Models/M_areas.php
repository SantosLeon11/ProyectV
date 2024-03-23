<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_areas extends Model
{
    protected $table = 'areas';
    protected $primaryKey = 'ID';
    public $timestamps = true;

    protected $fillable = [
        'Nombre',
        'ID_sucursal'
    ];

    // Definir la relación con la tabla sucursales
    public function sucursal()
    {
        return $this->belongsTo(M_sucursales::class, 'ID_sucursal', 'ID');
    }
}

