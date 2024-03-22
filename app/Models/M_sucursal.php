<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\M_empresas;

class M_sucursal extends Model
{
    use HasFactory;
    
    protected $table = 'sucursales';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Direccion',
        'ID_empresa'
    ];

    // Definir la relación con la tabla empresas
    public function empresa()
    {
        return $this->hasOne(M_empresas::class, 'ID', 'ID_empresa');
    }   
}
