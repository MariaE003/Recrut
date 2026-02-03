@extends('base')

@section('contenu')

<div class="bg-[#F8FAFC] min-h-screen">
    <div class="max-w-[1440px] mx-auto px-6 py-8">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- COLONNE GAUCHE : Formulaire -->
            <div class="flex-1 space-y-8">
                <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100">

                    <div class="mb-10">
                        <h1 class="text-2xl font-bold text-slate-800">Mon Profil Professionnel</h1>
                        <p class="text-slate-500 text-sm italic">Construisez votre CV pour les recruteurs</p>
                    </div>

                    <form action="{{ route('create.profile') }}" method="POST" enctype="multipart/form-data" id="profileForm" class="space-y-12">
                        @csrf

                        <!-- IDENTITÉ ET PHOTO -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                            <div class="flex flex-col items-center gap-4">
                                <div class="relative group">
                                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-xl">
                                        <img id="preview" src="https://ui-avatars.com/api/?name={{ $user->name }}&background=6366f1&color=fff" class="w-full h-full object-cover">
                                    </div>
                                    <label class="absolute bottom-0 right-0 bg-indigo-600 text-white p-2 rounded-full cursor-pointer hover:scale-110 transition shadow-lg">
                                        <i class="fas fa-camera"></i>
                                        <input type="file" name="photo" class="hidden" onchange="previewImage(this)">
                                    </label>
                                </div>
                                <span class="text-[10px] font-bold uppercase text-slate-400">Photo de profil</span>
                            </div>

                            <div class="md:col-span-2 space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-1">
                                        <label class="text-xs font-bold text-slate-700 ml-1">Nom complet</label>
                                        <input type="text" name="name" readonly value="{{$user->name}}" class="w-full bg-slate-50 border-none rounded-2xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500/20">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-xs font-bold text-slate-700 ml-1">Spécialité (Métier)</label>
                                        <input type="text" value="{{$chercheur->titre}}" name="titre" placeholder="Ex: Développeur Laravel" class="w-full bg-slate-50 border-none rounded-2xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500/20">
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <label class="text-xs font-bold text-slate-700 ml-1">Bio / Résumé</label>
                                    <textarea name="bio" rows="2" class="w-full bg-slate-50 border-none rounded-2xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500/20" placeholder="Décrivez votre valeur ajoutée...">{{$chercheur->bio}}</textarea>
                                </div>
                            </div>
                        </div>

                        <hr class="border-slate-100">

                        <!-- COMPÉTENCES -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <h2 class="text-sm font-bold uppercase tracking-widest text-indigo-600 flex items-center gap-2">
                                    <i class="fas fa-lightbulb text-amber-400"></i> Compétences
                                </h2>
                                <div class="flex gap-2">
                                    <input type="text" id="newSkill" placeholder="Ex: React, Gestion..." class="bg-slate-50 border-none rounded-xl py-2 px-4 text-xs focus:ring-1 focus:ring-indigo-500">
                                    <button type="button" id="addSkillBtn" class="bg-indigo-600 text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-indigo-700">Ajouter</button>
                                </div>
                            </div>
                            <div id="skillsList" class="flex flex-wrap gap-2 min-h-[40px] p-4 bg-slate-50 rounded-[1.5rem] border border-dashed border-slate-200">
                                @if($comp)
                                    @foreach($comp as $c)
                                        <div class="bg-white px-4 py-2 rounded-full shadow-sm border border-slate-100 flex items-center gap-2 text-xs font-semibold text-slate-700">
                                            <span>{{ $c->name }}</span>
                                            <button type="button" class="removeSkill text-slate-400 hover:text-rose-500"><i class="fas fa-times"></i></button>
                                            <input type="hidden" name="competences[]" value="{{ $c->name }}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- EXPÉRIENCES -->
                        <div class="space-y-6">
                            <div class="flex items-center justify-between">
                                <h2 class="text-sm font-bold uppercase tracking-widest text-indigo-600 flex items-center gap-2">
                                    <i class="fas fa-briefcase"></i> Expériences Professionnelles
                                </h2>
                                <button type="button" id="addExperienceBtn" class="text-xs font-bold text-indigo-600 bg-indigo-50 px-4 py-2 rounded-xl hover:bg-indigo-100 transition">+ Ajouter une expérience</button>
                            </div>
                            <div id="experiencesList" class="space-y-4">
                                @if($exper)
                                    @foreach($exper as $exp)
                                        <div class="p-6 rounded-[2rem] bg-slate-50/50 border border-slate-100 relative group animate-fadeIn">
                                            <button type="button" class="removeExperience absolute top-4 right-4 text-slate-300 hover:text-rose-500 transition"><i class="fas fa-trash-alt"></i></button>
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div class="space-y-1">
                                                    <label class="text-[10px] font-bold text-slate-400 ml-1">Poste</label>
                                                    <input type="text" name="experiences[{{$loop->index}}][poste]" value="{{ $exp->poste }}" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                                                </div>
                                                <div class="space-y-1">
                                                    <label class="text-[10px] font-bold text-slate-400 ml-1">Entreprise</label>
                                                    <input type="text" name="experiences[{{$loop->index}}][entreprise]" value="{{ $exp->entreprise }}" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                                                </div>
                                                <div class="space-y-1">
                                                    <label class="text-[10px] font-bold text-slate-400 ml-1">Durée / Dates</label>
                                                    <input type="text" name="experiences[{{$loop->index}}][duree]" value="{{ $exp->duree }}" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- FORMATIONS -->
                        <div class="space-y-6">
                            <div class="flex items-center justify-between">
                                <h2 class="text-sm font-bold uppercase tracking-widest text-indigo-600 flex items-center gap-2">
                                    <i class="fas fa-graduation-cap"></i> Formations & Diplômes
                                </h2>
                                <button type="button" id="addFormationBtn" class="text-xs font-bold text-indigo-600 bg-indigo-50 px-4 py-2 rounded-xl hover:bg-indigo-100 transition">+ Ajouter une formation</button>
                            </div>
                            <div id="formationsList" class="space-y-4">
                                @if($form)
                                    @foreach($form as $forma)
                                        <div class="p-6 rounded-[2rem] bg-slate-50/50 border border-slate-100 relative group animate-fadeIn">
                                            <button type="button" class="removeFormation absolute top-4 right-4 text-slate-300 hover:text-rose-500 transition"><i class="fas fa-trash-alt"></i></button>
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div class="space-y-1">
                                                    <label class="text-[10px] font-bold text-slate-400 ml-1">Diplôme / Titre</label>
                                                    <input type="text" name="formations[{{$loop->index}}][diplome]" value="{{ $forma->diplome }}" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                                                </div>
                                                <div class="space-y-1">
                                                    <label class="text-[10px] font-bold text-slate-400 ml-1">École / Université</label>
                                                    <input type="text" name="formations[{{$loop->index}}][ecole]" value="{{ $forma->ecole }}" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                                                </div>
                                                <div class="space-y-1">
                                                    <label class="text-[10px] font-bold text-slate-400 ml-1">Année</label>
                                                    <input type="text" name="formations[{{$loop->index}}][annee]" value="{{ $forma->annee }}" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="pt-10">
                            <button type="submit" class="w-full md:w-auto px-12 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-xl shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-300">
                                Finaliser mon profil pro
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- COLONNE DROITE : Preview Card -->
            <div class="lg:w-80">
                <div class="sticky top-8 space-y-6">
                    <div class="bg-indigo-600 rounded-[2.5rem] p-6 text-white shadow-2xl shadow-indigo-200 overflow-hidden relative">
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-500 rounded-full blur-3xl"></div>
                        <h4 class="text-xs font-bold uppercase tracking-widest opacity-60 mb-6">Aperçu en direct</h4>
                        <div class="relative z-10 space-y-4">
                            <img id="preview-mini" src="https://ui-avatars.com/api/?name={{ $user->name }}&background=fff&color=6366f1" class="w-20 h-20 rounded-[1.5rem] border-2 border-indigo-400/30 object-cover shadow-lg">
                            <div>
                                <h3 id="previewName" class="font-bold text-lg">{{ $user->name }}</h3>
                                <p class="text-indigo-200 text-xs font-medium">Profil en cours...</p>
                            </div>
                            <div class="pt-4 border-t border-indigo-500/50 space-y-3">
                                <div class="flex justify-between text-[10px] font-bold italic">
                                    <span>Force du profil</span>
                                    <span id="profileStrength">0%</span>
                                </div>
                                <div class="w-full bg-indigo-800 rounded-full h-1.5">
                                    <div id="strengthBar" class="bg-emerald-400 h-full rounded-full transition-all duration-500" style="width:0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] p-6 border border-slate-100 shadow-sm">
                        <h4 class="text-xs font-bold text-slate-800 mb-4 uppercase">Pourquoi compléter ?</h4>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-2 text-[11px] text-slate-500 leading-relaxed text-justify italic">
                                <i class="fas fa-check-circle text-emerald-500 mt-0.5"></i>
                                Plus de visibilité auprès des recruteurs.
                            </li>
                            <li class="flex items-start gap-2 text-[11px] text-slate-500 leading-relaxed text-justify italic">
                                <i class="fas fa-check-circle text-emerald-500 mt-0.5"></i>
                                Mise en avant de vos compétences réelles.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // IMAGE PREVIEW
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview-mini').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // AJOUTER / SUPPRIMER DYNAMIQUEMENT LES CHAMPS
    document.addEventListener('DOMContentLoaded', () => {
        const skillsList = document.getElementById('skillsList');
        const addSkillBtn = document.getElementById('addSkillBtn');
        const newSkillInput = document.getElementById('newSkill');

        addSkillBtn.addEventListener('click', () => {
            const val = newSkillInput.value.trim();
            if(!val) return;

            const div = document.createElement('div');
            div.className = "bg-white px-4 py-2 rounded-full shadow-sm border border-slate-100 flex items-center gap-2 text-xs font-semibold text-slate-700";
            div.innerHTML = `
                <span>${val}</span>
                <button type="button" class="removeSkill text-slate-400 hover:text-rose-500"><i class="fas fa-times"></i></button>
                <input type="hidden" name="competences[]" value="${val}">
            `;
            skillsList.appendChild(div);

            newSkillInput.value = '';
            updateStrength();
        });

        skillsList.addEventListener('click', e => {
            if(e.target.closest('.removeSkill')) {
                e.target.closest('div').remove();
                updateStrength();
            }
        });

        // DYNAMIQUE EXPERIENCES
        const experiencesList = document.getElementById('experiencesList');
        const addExperienceBtn = document.getElementById('addExperienceBtn');
        addExperienceBtn.addEventListener('click', () => {
            const index = experiencesList.children.length;
            const div = document.createElement('div');
            div.className = "p-6 rounded-[2rem] bg-slate-50/50 border border-slate-100 relative group animate-fadeIn";
            div.innerHTML = `
                <button type="button" class="removeExperience absolute top-4 right-4 text-slate-300 hover:text-rose-500 transition"><i class="fas fa-trash-alt"></i></button>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-400 ml-1">Poste</label>
                        <input type="text" name="experiences[${index}][poste]" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-400 ml-1">Entreprise</label>
                        <input type="text" name="experiences[${index}][entreprise]" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-400 ml-1">Durée / Dates</label>
                        <input type="text" name="experiences[${index}][duree]" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                    </div>
                </div>
            `;
            experiencesList.appendChild(div);
            updateStrength();
        });

        experiencesList.addEventListener('click', e => {
            if(e.target.closest('.removeExperience')) {
                e.target.closest('div').remove();
                updateStrength();
            }
        });

        // DYNAMIQUE FORMATIONS
        const formationsList = document.getElementById('formationsList');
        const addFormationBtn = document.getElementById('addFormationBtn');
        addFormationBtn.addEventListener('click', () => {
            const index = formationsList.children.length;
            const div = document.createElement('div');
            div.className = "p-6 rounded-[2rem] bg-slate-50/50 border border-slate-100 relative group animate-fadeIn";
            div.innerHTML = `
                <button type="button" class="removeFormation absolute top-4 right-4 text-slate-300 hover:text-rose-500 transition"><i class="fas fa-trash-alt"></i></button>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-400 ml-1">Diplôme / Titre</label>
                        <input type="text" name="formations[${index}][diplome]" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-400 ml-1">École / Université</label>
                        <input type="text" name="formations[${index}][ecole]" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-400 ml-1">Année</label>
                        <input type="text" name="formations[${index}][annee]" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                    </div>
                </div>
            `;
            formationsList.appendChild(div);
            updateStrength();
        });

        formationsList.addEventListener('click', e => {
            if(e.target.closest('.removeFormation')) {
                e.target.closest('div').remove();
                updateStrength();
            }
        });

        // CALCUL FORCE PROFIL
        function updateStrength() {
            let strength = 20;
            strength += skillsList.children.length > 0 ? 20 : 0;
            strength += experiencesList.children.length > 0 ? 30 : 0;
            strength += formationsList.children.length > 0 ? 30 : 0;
            strength = Math.min(strength, 100);

            document.getElementById('profileStrength').innerText = strength + '%';
            document.getElementById('strengthBar').style.width = strength + '%';
        }

        updateStrength();
    });
</script>

<style>
.animate-fadeIn {
    animation: fadeIn 0.3s ease-out;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection
