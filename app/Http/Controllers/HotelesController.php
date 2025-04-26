<?php

namespace App\Http\Controllers;

use App\Models\Hoteles;
use Illuminate\Http\Request;

class HotelesController extends Controller
{
    public function index()
    {
        return Hoteles::with('ciudades')->withTrashed()->get();
    }

    public function store(Request $request)
    {
        //parametros a buscar y comprar si ya existe hotel, buscamos por nit y nombre
        $params = [
            'nit'    => $request->nit,
            'nombre' => $request->nombre,
        ];

        //parametros a guardar
        $dataToSave = [
            'nombre'     => $request->nombre,
            'nit'        => $request->nit,
            'id_ciudad'  => $request->id_ciudad,
            'numero_hab' => $request->numero_hab,
            'direccion'  => $request->direccion,
        ];

        //metodo de guardado
        if (!$request->id) {
            $validate = Hoteles::where($params)->first();
            if (isset($validate)) {
                return response()->json(['error' => 'Ya existe un Hotel registrado con estos datos']);
            } else {
                $data = Hoteles::create($dataToSave);
            }
            //metodo actualizacion
        } else {
            $findHotel = Hoteles::find($request->id);

            $existeHotel = Hoteles::where($params)->where('id', '!=', $request->id)->first();
            if ($existeHotel) {
                return response()->json(['error' => 'Ya existe otro hotel con este Nombre y NIT.']);
            }
            $findHotel->update($dataToSave);
            $data = $findHotel;
        }
        return response()->json($data);
    }

   
    public function destroy($id)
    {
        //buscamos hotel y obtenemos su estado
        $hotel = Hoteles::withTrashed()->find($id);
        if ($hotel) {
            //si esta eliminado se restaura
            if ($hotel->trashed()) {
                $hotel->restore();
            }else{
            //si esta activo se elimina
                $hotel->delete();
            }
        }
        $data = $hotel;
        return response()->json($data);
    }
}
