<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Experience;
use App\Models\Chercheur;
use App\Models\Formation;
use Illuminate\Http\Request;

class ChercheurController extends Controller
{
    //
    public function createProfil(Request $request){
        // $request->validate([
        // '',
        // ]);

        Chercheur::create([
            'titre'=>$request->titre,
            'bio'=>$request->bio,
            // 'user_id'=
        ]);
        Competence::create([
            'name'=>$request->name,
            // 'user_id'
        ]);
               
        Experience::create([
            'poste'=>$request->poste,
            'entreprise'=>$request->entreprise,
            'duree'=>$request->duree,
            // 'user_id',
        ]);

        Experience::create([
            'poste'=>$request->poste,
            'entreprise'=>$request->entreprise,
            'duree'=>$request->duree,
            // 'user_id',
        ]);

        Formation::create([
            'diplome'=>$request->diplome,
            'ecole'=>$request->ecole,
            'annee'=>$request->annee,
        ]);

    }


    // public function postulerOffre(){}


}
