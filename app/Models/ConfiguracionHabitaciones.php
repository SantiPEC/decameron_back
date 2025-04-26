<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfiguracionHabitaciones extends Model
{
    protected $connection = 'pgsql';
    protected $fillable = ['id_hotel','id_tipo_acomodacion','id_tipo_habitacion','cantidad'];
    protected $table    = 'configuracion_habitaciones';
    use HasFactory,SoftDeletes;

    function acomodaciones(){
        return $this->hasOne(TipoAcomodaciones::class, 'id', 'id_tipo_acomodacion');
    }

    function hotel(){
        return $this->hasOne(Hoteles::class, 'id', 'id_hotel');
    }

    function habitaciones(){
        return $this->hasOne(TipoHabitaciones::class, 'id', 'id_tipo_habitacion');
    }

}
