<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Estados extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'idestados';
    protected $fillable = ['idestados','nombre'];

    public function sucursal(){
        return $this->hasMany('App\Models\Sucursales');
    }
}
