<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_articulo extends Model
{
    protected $table = 'articulo';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'Codigo',
        'Descripcion',
        'Unidad',
        'ID_plantilla'
    ];

    // Definir la relación con la tabla plantillas
    public function plantilla()
    {
        return $this->belongsTo(M_plantillas::class, 'ID_plantilla', 'ID');
    }
}
