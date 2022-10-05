<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomienda extends Model
{
    use HasFactory;
    protected $table = 'encomienda';
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono_remitente',
        'ci',
        'destinatario',
        'telefono_destinatario',
        'contenido',
        'valor',
        'fecha_recepcion',
        'estado'
    ];
}
