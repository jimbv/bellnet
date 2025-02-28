<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuration; 

class ConfigurationsController extends Controller
{
    public function index()
    {
        $configuration = Configuration::first();
        return view('admin.configuration', compact('configuration'));
    }

    public function update(Request $request)
    {
        $configuration = Configuration::first();
        $configuration->url_catalogo = $request->url_catalogo;
        $configuration->url_devolucion = $request->url_devolucion;
        $configuration->url_lista = $request->url_lista;
        $configuration->save();
        return view('admin.configuration', compact('configuration'));
    }
}
