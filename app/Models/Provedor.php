<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provedor extends Model
{
    use HasFactory;
    use SoftDeletes;
   
    protected $primaryKey = 'idpro';
    protected $fillable = ['idpro','foto','nombre','apellidoM','apellidoP','telefono','correo','estado','municipio','localidad','calle',
                'numeroint','numeroext']; 
}
