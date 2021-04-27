<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\User; 
use Illuminate\Support\Facades\Hash;

class CambiarClave extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('auth.cambiarclave');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      
    public function cambiarclave(Request $request )
    {

   
        $usuario = User::findOrFail($request->idusuario); 


        if(Hash::check($request->oldpassword, $usuario->password)){
            $request["oldpassword"]= 'OK';
        }else{
            $request["oldpassword"]= 'NO';
        } 

        
        $request->validate([
            'oldpassword' =>  [
                'required', 
                function ($attribute, $value, $fail) {
                    if ($value != 'OK') {
                        $fail('La clave anterior no es correcta.'.$value);
                    }
                },
            ],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $usuario->password = Hash::make($request->password); 
        
        $usuario->save();   
        return redirect()->route('cambiarclaveindex')->with('datos','Registro actualizado correctamente');
    }
     
}
