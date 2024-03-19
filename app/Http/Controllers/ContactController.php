<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Rules\ReCaptcha;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{ 
    public function submit(Request $request): RedirectResponse
    { 
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
  
        $input = $request->all();
  
        /*------------------------------------------
        --------------------------------------------
        Write Code for Store into Database & send mail
        --------------------------------------------
        --------------------------------------------*/
         
  
        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }

}
