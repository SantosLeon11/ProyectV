<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_plantillas_campos extends Model
{
    protected $table = 'plantillas_campos';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Tipo',
        'ID_plantilla'
    ];

    // Definir la relación con la tabla plantillas
    public function plantilla()
    {
        return $this->belongsTo(M_plantillas::class, 'ID_plantilla', 'ID');
    }
}
