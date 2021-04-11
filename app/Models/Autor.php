<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'idau';
    protected $fillable = ['idau','nombre','app','apm','sexo','fecha_na','foto',
                'nacionalidad','clave_inter','biografia','idtu','idgen'];
                
                public function genero(){
                    return $this->belongsTo('App\Models\Genero', 'idgen');
                }
}
