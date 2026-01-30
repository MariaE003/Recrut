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
    // echercher un utilisateur par : Nom, Spécialité
    public function search(Request $request){
        if($request->name){
            $user=User::where('name',$request->name)->get();
        }
        if ($request->specialite) {
            $user=User::where('specialite',$request->specialite)->get();
        }
        return view('home',compact('user'));

    }

    public function findUserById($id){
        $ami=User::where('id',$id)->get();
        return view('detail',compact('ami'));
    }

    // public function AjouterAmis($receiver){
    //     Amis::create([
    //         'sender_id'=> Auth::id(),
    //         'receiver_id'=>$receiver,
    //         'status'=>'en_attente',
    //     ]);
    //     return back();
    // }
    // public function accepterAmis(Request $request,$id){
    //     Amis::where('id',$id)->update(['status'=>'accepter']);
    //     return redirect('/');
    //     // return redirect()->route('nameRoute');
    // }
    // public function refuseAmis($id){
    //     Amis::where('id',$id)->update(['status'=>'refuse']);
    //     return redirect('/');
    // }
}
