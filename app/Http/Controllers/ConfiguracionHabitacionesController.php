<?php

namespace App\Http\Controllers;

use App\Models\ConfiguracionHabitaciones;
use App\Models\Hoteles;
use Illuminate\Http\Request;

class ConfiguracionHabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ConfiguracionHabitaciones::with(['acomodaciones','hotel','hotel.ciudades','habitaciones'])->withTrashed()->get());
    }

    public function store(Request $request)
    {
        //parametros a guardar
        $acomodacionExiste = [
            'id_hotel'            => $request->id_hotel,
            'id_tipo_acomodacion' => $request->id_tipo_acomodacion,
            'id_tipo_habitacion'  => $request->id_tipo_habitacion,
        ];

        //consultamos el total de habitaciones posibles por usar en el hotel y el total de habitaciones ocupadas 
        $cantHabHotel = Hoteles::select('numero_hab')->where('id',$request->id_hotel)->first();
        $cantHabConfiguradas = ConfiguracionHabitaciones::where('id_hotel', $request->id_hotel)->sum('cantidad');
        
        //buscamos si ya existe un hotel configurado con las mismas caracteristicas
        $validate = ConfiguracionHabitaciones::where($acomodacionExiste)->where('id','!=',$request->id)->first();

        if (isset($validate)) {
            return response()->json(['error' => 'Ya existen una habitación con los mismos parametros para este tipo de acomodación.']);
        }
        //metodo de guardado
        if (!$request->id) {

            if ($cantHabConfiguradas + $request->cantidad > $cantHabHotel->numero_hab ) {
                return response()->json(['error' => 'No se pueden configurar mas habitaciones de las asignadas al Hotel.']);
            }

            $acomodacionExiste['cantidad'] = $request->cantidad;

            $saveAcomodacion = ConfiguracionHabitaciones::create($acomodacionExiste);

            $data = $saveAcomodacion;
        //metodo de edicion
        } else {
            $acomodacionExiste['cantidad'] = $request->cantidad;

            $saveAcomodacion = ConfiguracionHabitaciones::find($request->id);

            $data = $saveAcomodacion->update($acomodacionExiste);
        }

        return response()->json($data);
    }

    public function destroy($id)
    {
        //buscamos configuracion a eliminar
        $info = ConfiguracionHabitaciones::withTrashed()->find($id);
        if ($info) {
            //si esta eliminada se restaura
            if ($info->trashed()) {
                $info->restore();
            }else{
                //si esta activa se elimina
                $info->delete();
            }
        }
        $data = $info;
        return response()->json($data);
    }
}
