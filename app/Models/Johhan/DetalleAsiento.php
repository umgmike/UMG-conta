<?php

namespace App\Models\Johhan;

use Illuminate\Database\Eloquent\Model;

class DetalleAsiento extends Model
{
    protected $table = 'detalle_asiento';
    protected $fillable = ['id_asiento', 'id_cuenta', 'debe','haber'];
    protected $guarded = ['id'];
}