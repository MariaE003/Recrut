<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function contactForm(){
        return view('contactTest.contact');

    }

    public function submitForm(Request $request){
        $name=$request->input('name');
        return "Merciii $name";
    }
    
}
