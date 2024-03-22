<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plantillas extends Model
{
    protected $table = 'plantillas';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'Nombre'
    ];
}
