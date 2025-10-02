<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SubscriptionsController extends Controller
{
    public function list()
    {
        $subscriptions = Subscription::all();
        return view('admin.subscriptions.list', compact('subscriptions'));
    }

    public function save(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email|unique:subscriptions|string',
            ], [
                'email.required' => 'El email es obligatorio.',
                'email.unique' => 'Ya existe el email.',
            ]);
            Subscription::create($validatedData);
            return redirect()->back()->with('success', 'Subscripción guardada correctamente.');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return redirect()->back()->withErrors($errors);
        }
    }


    public function delete($id)
    {
        $subscription = Subscription::find($id);
        $subscription->delete();
        return redirect()->back();
    }
}
