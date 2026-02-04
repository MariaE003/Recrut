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
        // chercheur
        if($user->chercheur){
            $user->chercheur()->update([
                'titre'=>$request->titre,
                'bio'=>$request->bio,
            ]);
        }else{
            $user->chercheur()->create([
                'titre'=>$request->titre,
                'bio'=>$request->bio,
            ]);
        }
        // competences
        // je doit cheker competence ici si deja exist + sinon creer new competence
        foreach($request->competences as $competence){
            if ($competence) {
            $user->competences()->create([
                'name'=>$competence,
            ]);
            }
        }
        // experience
        foreach($request->experiences as $experience){
            if (isset($experience['id'])) {
                $user->experiences()->where('id',$experience['id'])->update([
                    'poste'=>$experience['poste'],
                    'entreprise'=>$experience['entreprise'],
                    'duree'=>$experience['duree'],
                ]);
            }else{
                $user->experiences()->create([
                    'poste'=>$experience['poste'],
                    'entreprise'=>$experience['entreprise'],
                    'duree'=>$experience['duree'],
                ]); 
                }
            }
        // formation
        foreach ($request->formations as $form) {
            if (isset($form['id'])) {
                $user->formations()->where('id',$form['id'])->update([
                    'diplome' => $form['diplome'],
                    'ecole' => $form['ecole'],
                    'annee' => $form['annee'],
                ]);
            }else{
                $user->formations()->create([
                    'diplome' => $form['diplome'],
                    'ecole' => $form['ecole'],
                    'annee' => $form['annee'],
                ]);
                }
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


    // public function postulerOffre(){
    //     $user = auth()->user();
    //     $offre=Offre::find($offre_id)
    // }


}
