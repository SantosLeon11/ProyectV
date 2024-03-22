<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'Razon_social',
        'Rfc',
        'Contacto',
        'Direccion'
    ];
}
