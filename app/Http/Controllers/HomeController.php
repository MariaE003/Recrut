<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $age=22;
        return view('home',['age'=>$age]);
    } 

    public function show($id){
        return "details de user !!! $id";
    }
}

