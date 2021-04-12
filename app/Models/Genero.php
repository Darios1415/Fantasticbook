<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;
class Genero extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'idgen';
    protected $fillable = ['idgen','nombre'];

    public function autor(){
        return $this->hasMany('App\Models\Autor');
    }
}
