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
            $offre=Offre::where('titre',$request->offre);
        }
        return view('affichierOffre',compact('offres','offre'));
    }
    
    // public function detaillOffre($id){
    //     $offre=Offre::where('id',$id);
    //     return view('detail-offre',compact('offre'));
    // }

}
