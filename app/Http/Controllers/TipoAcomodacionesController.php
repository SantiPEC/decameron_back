<?php

namespace App\Http\Controllers;

use App\Models\TipoAcomodaciones;
use Illuminate\Http\Request;

class TipoAcomodacionesController extends Controller
{
    public function index()
    {
        return response()->json(TipoAcomodaciones::all());
    }
}
