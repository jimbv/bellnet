<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\ReCaptcha;
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

        $validatedData = $request->validate([
            'email' => 'required|email|unique:subscriptions|string',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ], [
            'email.required' => 'El email es obligatorio.',
            'email.unique' => 'Ya existe el email.',
            'g-recaptcha-response.required' => 'Por favor, completa la verificación reCAPTCHA.'
        ]);
        Subscription::create($validatedData);
        return redirect()->back()->with('success', 'Subscripción guardada correctamente.');
    }


    public function delete($id)
    {
        $subscription = Subscription::find($id);
        $subscription->delete();
        return redirect()->back();
    }
}
