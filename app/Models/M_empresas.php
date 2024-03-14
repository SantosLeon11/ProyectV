<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_empresas extends Model
{
    use HasFactory;
    protected $table = 'tbl_empresas';

    protected $primaryKey = 'ID_Empresa';

    protected $fillable = ['ID_Empresa', 'Razon_social'];

    public $timestamps = true;
}
