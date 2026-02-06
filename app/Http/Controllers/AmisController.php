<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Amis;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AmisController extends Controller
{
    public function show(Request $request){
        $id=auth()->user()->id;
        $user=null;
        if ($id) {
            // $amis=User::all();//li mkininch fi table amis
        $amis=User::where('id',"!=",$id)->get();//li mkininch fi table amis + machi howa
        if($request->search){
            $user=User::where('name',$request->search)
            // ->orWhere('specialite',$request->search)
            ->get();
        }
        return view('home',compact('user','amis'));        
        } 
    }
    // echercher un utilisateur par : Nom, Spécialité
    // public function search(Request $request){
    //     if($request->name){
    //         $user=User::where('name',$request->name)->get();
    //     }
    //     if ($request->specialite) {
    //         $user=User::where('specialite',$request->specialite)->get();
    //     }
    //     var_dump($user);
    //     return view('home',compact('user'));

    // }

    public function findUserById($id){
        $ami=User::where('id',$id)->get();
        return view('detail',compact('ami'));
    }

    public function AjouterAmis($receiver){
        Amis::create([
            'sender_id'=> Auth::id(),
            'receiver_id'=>$receiver,
            'status'=>'en_attente',
        ]);
        return redirect()->back()->with('success','invitation envoyer');
    }
    public function accepterAmis(Request $request){

        Amis::where('receiver_id',Auth::id)->where('sender_id',$request->idSender)->update(['status'=>'accepter']);

        return redirect()->back()->with('success','invitation accepter');
        }
        public function refuseAmis($id){
            Amis::where('receiver_id',Auth::id)->where('sender_id',$request->idSender)->update(['status'=>'refuse']);
            return redirect()->back()->with('success','invitation refuse');
    }
}
