<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provedor extends Model
{
    use HasFactory;
   
    protected $primaryKey = 'idpro';
    protected $fillable = ['idpro','foto','nombre','apellidoM','apellidoP','telefono','correo','estado','municipio','localidad','calle',
                'numeroint','numeroext']; 
}
