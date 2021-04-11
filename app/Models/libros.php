<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;
use App\Models\generos;
use App\Models\subgeneros;
use App\Models\libros;

class libros extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey ='idlibro';
    protected $fillable =['idlibro','nombre','autor','paginas','fechap','idioma',
    'sinopsis','idgen','idsubgen','archivo','precio','disponibilidad','foto'];
}
