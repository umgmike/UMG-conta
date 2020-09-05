<?php

namespace App\Models\Johhan;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    protected $table = 'prueba';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
