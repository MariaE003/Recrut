<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
class OffreController extends Controller
{
    //
    public function affichierOffres(Request $request){

        $offres=Offre::where('cloturer',false)->get();

        $offre=null;

        if ($request->offre) {
            $offre=Offre::where('titre',$request->offre)->get();
        }
        return view('affichierOffre', compact('offres','offre'));

    }
    
    public function detailOffre($id){
        $offre=Offre::find($id);
        // dd($offre);
        return view('detailoffre',compact('offre'));
    }

}