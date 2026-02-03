<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;

class RecruteurController extends Controller
{
    //

    public function createOffre(Request $request){
        Offre::create([
            'entrepriseName'=>$request->entrepriseName,
            'typeContrat'=>$request->typeContrat,
            'titre'=>$request->titre,
            'description'=>$request->description,
            'photo'=>$request->photo,
            'cloture'=>$request->cloture,
            // 'user_id'=>
        ]);
    }
    // public function cloturerOffre(){

    // }
    // public function consulterCandidature(){

    // }
    
    
}
