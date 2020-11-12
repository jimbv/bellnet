<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Permisos\Models\Role;
use App\Permisos\Models\Permission;

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
    public function index()
    {
        $roles = Role::orderBy('id','Desc')->paginate(2);   
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
        $request->validate([
            'nombre' => 'required|max:50|unique:roles,nombre',
            'slug' => 'required|max:50|unique:roles,slug',
            'acceso-total' => 'required|in:si,no',
            'nombre' => 'required|max:50|unique:roles,nombre',
        ]);
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //$rol = Role::where('slug',$slug)->firstOrFail();
        if (Role::where('slug',$slug)->first()) {
            return 'Slug existe';
        }else{
            return 'Slug disponible';
        } 
        /*$editar = "Si";

        return view('admin.category.show',compact('cat','editar'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'ok';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
