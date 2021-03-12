<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;
class Subgenero extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'idsg';
    protected $fillable = ['idsg','nombre','descripcion'];
}
