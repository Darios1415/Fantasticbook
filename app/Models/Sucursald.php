<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursald extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','telefono','municipio','calle','interior','exterior'];
}



