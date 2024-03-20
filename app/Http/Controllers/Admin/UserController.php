<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permisos\Models\Role;
use App\User;
use App\Provincia;
use App\Localidad;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Gate::authorize('haveaccess','admin.user.index');
        $buscar = $request->get('nombre');
        $users = User::with('roles')->where('apellido', 'like', "%$buscar%")->orWhere('nombres', 'like', "%$buscar%")->orWhere('cuit', 'like', "%$buscar%")
            ->orderBy('apellido')->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');
        $localidades = $prov::find(6)->localidades;
        $roles = Role::orderBy('nombre')->get();
        $localidad = 1271;
        return view('admin.user.create', compact('roles', 'localidades', 'provincias', 'localidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'apellido' => 'required',
            'nombres' => 'required',
            'email' => 'required',
            'cuit' => 'required|unique:users,cuit',
            'email' => 'required|unique:users,email'
        ]);

        User::create([
            'apellido' => $request['apellido'],
            'nombres' => $request['nombres'],
            'email' => $request['email'],
            'nacimiento' => $request['nacimiento'],
            'password' => Hash::make($request['password']),
            'calle' => $request['calle'],
            'numero' => $request['numero'],
            'depto' => $request['depto'],
            'telefono' => $request['telefono'],
            'cuit' => $request['cuit'],
            'observaciones' => $request['observaciones'],
            'localidad_id' => $request['localidad_id']
        ]);
        //$user = User::create($request->all());


        if ($request->get('roles')) {
            $user->roles()->sync($request->get('roles'));
        }

        return redirect()->route('admin.user.index')
            ->with('datos', 'Usuario guardado correctamente');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //Gate::authorize('haveaccess','admin.user.edit');
        $role_user = [];
        foreach ($user->roles as $rol) {
            $role_user[] = $rol->id;
        }

        $prov  =  new Provincia();
        $provincias =  $prov->all()->sortBy('nombre');
        $localidades = $prov::find(6)->localidades;


        $roles = Role::orderBy('nombre')->get();

        $localidad = $user->localidad;

        return view('admin.user.edit', compact('roles', 'user', 'role_user', 'localidades', 'provincias', 'localidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //Gate::authorize('haveaccess','admin.user.edit');
        
        $request->validate([
            'nombres' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'cuit' => [
                'required',
                'max:50',
                'unique:users,cuit,'.$request->cuit.',cuit' // Aquí se utiliza exclude_if
            ],
        ]);

        $user->fill($request->all())->save();

        if ($request->get('roles')) {
            $user->roles()->sync($request->get('roles'));
        }

        return redirect()->route('admin.user.index')
            ->with('datos', 'Usuario editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //Gate::authorize('haveaccess','admin.role.destroy');
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('datos', 'Registro eliminado correctamente');
    }
}
