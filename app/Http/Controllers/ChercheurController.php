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
    public function getName(){
        $user=auth()->user();
        $chercheur=auth()->user()->chercheur;
        $comp=auth()->user()->competences;
        $exper=auth()->user()->experiences;
        $form=auth()->user()->formations;
        return view('profil',compact('user','comp','exper','form','chercheur'));
    }
    public function createProfil(Request $request){
        $request->validate([
            'titre' => 'required',
            'bio' => 'required',
            'name'=>'nullable|array',
            'competences' => 'nullable|array',
            'experiences' => 'nullable|array',
            'formations' => 'nullable|array',
        ]);

        $user=auth()->user();

        $user->chercheur()->create([
            'titre'=>$request->titre,
            'bio'=>$request->bio,
        ]);

        foreach($request->competences as $competence){
            $user->competences()->create([
                'name'=>$competence,
            ]);
        }

        foreach($request->experiences as $experience){
            $user->experiences()->create([
                'poste'=>$experience['poste'],
                'entreprise'=>$experience['entreprise'],
                'duree'=>$experience['duree'],
            ]);

            }
        foreach ($request->formations as $form) {
            $user->formations()->create([
                'diplome' => $form['diplome'],
                'ecole' => $form['ecole'],
                'annee' => $form['annee'],
            ]);
        }
        // return redirect('profil');

        // sans relation
        // Chercheur::create([
        //     'titre'=>$request->titre,
        //     'bio'=>$request->bio,
        //     // 'user_id'=
        // ]);
        // Competence::create([
        //     'name'=>$request->name,
        //     // 'user_id'
        // ]);
               
        // Experience::create([
        //     'poste'=>$request->poste,
        //     'entreprise'=>$request->entreprise,
        //     'duree'=>$request->duree,
        //     // 'user_id',
        // ]);

        // Experience::create([
        //     'poste'=>$request->poste,
        //     'entreprise'=>$request->entreprise,
        //     'duree'=>$request->duree,
        //     // 'user_id',
        // ]);

        // Formation::create([
        //     'diplome'=>$request->diplome,
        //     'ecole'=>$request->ecole,
        //     'annee'=>$request->annee,
        // ]);

        // avec relation

    }


    // public function postulerOffre(){}


}
