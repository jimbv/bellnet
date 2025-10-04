<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServicesController extends Controller
{
    public function showService($slug)
    {

        $services = Service::select('name', 'slug')->orderBy('name')->get();
        $service = Service::where('slug', $slug)->first();
        return view('service', compact('service','services'));
    }
}
