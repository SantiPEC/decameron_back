<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use Illuminate\Http\Request;

class CiudadesController extends Controller
{
    public function index()
    {
        return response()->json(Ciudades::all());
    }
}
