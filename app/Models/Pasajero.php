<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    use HasFactory;
    protected $table = 'pasajero';
    protected $fillable = [
        'nombre','apellido','ci','genero','telefono','direccion'
    ];
}
