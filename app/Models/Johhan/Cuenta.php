<?php

namespace App\Models\Johhan;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'cuenta';
    protected $fillable = ['id_categoria', 'nombreCuenta', 'condicion'];
    protected $guarded = ['id'];
}
