<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory;
	use SoftDeletes;
    protected $primaryKey = 'id';
    protected $fillable = ['id','nombre','app','apm','fn','telefono','estado','municipio','calle','num_i',
                'type','cuenta','correo','contra','genero','referencia']; 
}
