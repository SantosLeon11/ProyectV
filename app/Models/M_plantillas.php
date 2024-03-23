<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_plantillas extends Model
{
    protected $table = 'plantillas';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'Nombre'
    ];
}
