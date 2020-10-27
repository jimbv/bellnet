<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\Localidad;
 

class DatosPersonales extends Controller
{
    //
    
    public function getLocalidades(Request $request)
    {
        $loc = new Localidad();
        $localidades = $loc::where('provincia_id',$request->provincia_id)->get();
        return $localidades;
    }
}
