<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OffreController extends Controller
{
    //
    public function affichierOffres(){

    }
    
    public function detaillOffre($id){
        $offre=Offre::where('id',$id);
        // return view();
    }
    public function chercheOffre(Request $request){
        $offres=Offre::where('titre',$request->titre);
    }
}
