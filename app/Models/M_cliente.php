<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'Razon_social',
        'Rfc',
        'Contacto',
        'Direccion'
    ];
}
