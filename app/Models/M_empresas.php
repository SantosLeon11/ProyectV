<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_empresas extends Model
{

    use HasFactory;

    protected $table = 'empresas';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'Razon_social'
    ];
}
