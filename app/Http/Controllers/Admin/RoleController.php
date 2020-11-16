<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Permisos\Models\Role;
use App\Permisos\Models\Permission;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        Gate::authorize('haveaccess','admin.role.index');

        $nombre = $request->get('nombre'); 
        $roles = Role::where('nombre','like',"%$nombre%")->orderBy('nombre')->paginate(5);   
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        Gate::authorize('haveaccess','admin.role.create');
        $permisos = Permission::get(); 
        return view('admin.role.create',compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('haveaccess','admin.role.create');
        $request->validate([
            'nombre' => 'required|max:50|unique:roles,nombre',
            'slug' => 'required|max:50|unique:roles,slug',
            'descripcion' => 'required|max:50|unique:roles,slug',
            'acceso-total' => 'required|in:si,no'
        ]);

        $role = Role::create($request->all());

        if($request->get('permisos')){
            $role->permissions()->sync($request->get('permisos'));
        }


        //return $request->all();
        return redirect()->route('admin.role.index')
            ->with('datos','Rol guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    { 
        Gate::authorize('haveaccess','admin.role.show');
        $permission_role = [];
        foreach($role->permissions as $permission){
            $permission_role[] = $permission->id; 
        }
        
        $permisos = Permission::get(); 
        return view('admin.role.view',compact('permisos','role','permission_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('haveaccess','admin.role.edit');
        $permission_role = [];
        foreach($role->permissions as $permission){
            $permission_role[] = $permission->id; 
        }
 
        $permisos = Permission::get(); 
        return view('admin.role.edit',compact('permisos','role','permission_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    { 
        Gate::authorize('haveaccess','admin.role.edit');
        $request->validate([
            'nombre' => 'required|max:50|unique:roles,nombre,'.$role->id,
            'slug' => 'required|max:50|unique:roles,slug,'.$role->id,
            'descripcion' => 'required|max:50',
            'acceso-total' => 'required|in:si,no'
        ]);

        
        

 
        $role->fill($request->all())->save();

        /*$role = Role::update(
            
            $request->all());
*/
        if($request->get('permisos')){
            $role->permissions()->sync($request->get('permisos'));
        }


        //return $request->all();
        return redirect()->route('admin.role.index')
            ->with('datos','Rol editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('haveaccess','admin.role.destroy');
        $rol = Role::findOrFail($id); 
        $rol->delete();
        return redirect()->route('admin.role.index')->with('datos','Registro eliminado correctamente');
    }
}
