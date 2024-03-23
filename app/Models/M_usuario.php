<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\M_sucursales;

class M_usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'ID';
    public $timestamps = true;

    protected $fillable = [
        'Nombre',
        'Correo',
        'Usuario',
        'Password',
        'ID_sucursal',
    ];

    public function sucursal()
    {
        return $this->belongsTo(M_sucursales::class, 'ID_sucursal', 'ID');
    }
}
