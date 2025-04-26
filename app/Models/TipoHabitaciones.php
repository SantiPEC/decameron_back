<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoHabitaciones extends Model
{
    protected $connection = 'pgsql';
    protected $fillable   = ['nombre'];
    protected $table      = 'tipo_habitaciones';

    use HasFactory, SoftDeletes;
}
