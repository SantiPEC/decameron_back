<?php

namespace App\Http\Controllers;

use App\Models\TipoHabitaciones;

class TipoHabitacionesController extends Controller
{
    public function index()
    {
        return response()->json(TipoHabitaciones::all());
    }
}
