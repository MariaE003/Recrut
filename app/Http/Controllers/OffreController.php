<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
class OffreController extends Controller
{
    //
    public function affichierOffres(Request $request){

        // $offres=Offre::where('cloturer',false)->whereDoesntHave('postulant', function ($q) {
        //     $q->where('user_id', auth()->id());
        // })->get();

        $offres=Offre::with('postulant')->get();
        // dd($offres);
        $offres->map(function($off){
            $off->isApplied=$off->postulant->contains('id',auth()->id());
            $off->iscloture=(bool)$off->cloturer;   
            // dd($off->isApplied);     
            return $off;
            // dd($off);
        });


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