<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;

class RecruteurController extends Controller
{
    //

    public function createOffre(Request $request){
        $user=auth()->user();
        $img= $request->file('photo')->store('offres', 'public');
        $user->createurOffres()->create([
            'entrepriseName'=>$request->entrepriseName,
            'typeContrat'=>$request->typeContrat,
            'titre'=>$request->titre,
            'description'=>$request->description,
            'photo'=>$img,
            'cloturer'=>0,
            'user_id'=>$user->id,
        ]);
        return redirect()->route('offres');
            // dd($request->all());

    }

    // public function cloturerOffre(Request $request){
    //     Offre::where('id',$request->id)->update([
    //         'cloture'=>true,
    //     ]);
    // }

    // public function consulterCandidature(){

    // }
    
    
}
