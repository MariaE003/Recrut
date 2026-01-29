<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Amis;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AmisController extends Controller
{
    public function show(){
        $id=auth()->user()->id;
        if ($id) {
            // $amis=User::all();//li mkininch fi table amis
        $amis=User::where('id',"!=",$id)->get();//li mkininch fi table amis + machi howa
        return view('home',compact('amis'));        
        } 
    }
    
}
