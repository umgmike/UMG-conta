<?php

namespace App\Models\Johhan;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'naturaleza';
    protected $fillable = ['codigo', 'nombre'];
    protected $guarded = ['id'];
}
