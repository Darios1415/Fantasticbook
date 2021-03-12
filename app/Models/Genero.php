<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;
class Genero extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'idgenero';
    protected $fillable = ['idgenero','nombre','descripcion'];
}
