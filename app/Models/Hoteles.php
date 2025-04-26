<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hoteles extends Model
{
    protected $connection = 'pgsql';
    protected $fillable = ['nombre','nit','direccion','id_ciudad','numero_hab'];
    use HasFactory, SoftDeletes;

    function ciudades(){
        return $this->hasOne(Ciudades::class,'id','id_ciudad');
    }
}
