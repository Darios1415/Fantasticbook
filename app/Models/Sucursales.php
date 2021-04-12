<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Sucursales extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'idsucur';
    protected $fillable = ['nombre','telefono','codigo','postal',
    'estados','correo','activo','idmun','calle','interior','exterior','img'];
    
    
    public function municipio(){
        return $this->belongsTo('App\Models\Municipio', 'idmun');
    }

    public function estados(){
        return $this->belongsTo('App\Models\Estados', 'idestados');
    }
}
