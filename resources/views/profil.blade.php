@extends('base')

@section('contenu')
<!-- Alpine.js pour la gestion dynamique -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="bg-[#F8FAFC] min-h-screen" x-data="profileEditor()">
    <div class="max-w-[1440px] mx-auto px-6 py-8">
        
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- COLONNE GAUCHE : Formulaire -->
            <div class="flex-1 space-y-8">
                <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100">
                    
                    <div class="mb-10">
                        <h1 class="text-2xl font-bold text-slate-800">Mon Profil Professionnel</h1>
                        <p class="text-slate-500 text-sm italic">Construisez votre CV pour les recruteurs</p>
                    </div>

                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-12">
                        @csrf
                        
                        <!-- IDENTITÉ ET PHOTO -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                            <div class="flex flex-col items-center gap-4">
                                <div class="relative group">
                                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-xl">
                                        <img id="preview" src="https://ui-avatars.com/api/?name=&background=6366f1&color=fff" class="w-full h-full object-cover">
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
                                        <!-- le nom from db -->
                                        <label class="text-xs font-bold text-slate-700 ml-1">Nom complet</label>
                                        <input type="text" name="name" value="" class="w-full bg-slate-50 border-none rounded-2xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500/20">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-xs font-bold text-slate-700 ml-1">Spécialité (Métier)</label>
                                        <input type="text" name="specialite" placeholder="Ex: Développeur Laravel" class="w-full bg-slate-50 border-none rounded-2xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500/20">
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <label class="text-xs font-bold text-slate-700 ml-1">Bio / Résumé</label>
                                    <textarea name="bio" rows="2" class="w-full bg-slate-50 border-none rounded-2xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500/20" placeholder="Décrivez votre valeur ajoutée..."></textarea>
                                </div>
                            </div>
                        </div>

                        <hr class="border-slate-100">

                        <!-- COMPÉTENCES (SKILLS) -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <h2 class="text-sm font-bold uppercase tracking-widest text-indigo-600 flex items-center gap-2">
                                    <i class="fas fa-lightbulb text-amber-400"></i> Compétences
                                </h2>
                                <div class="flex gap-2">
                                    <input type="text" x-model="newSkill" @keydown.enter.prevent="addSkill()" placeholder="Ex: React, Gestion..." class="bg-slate-50 border-none rounded-xl py-2 px-4 text-xs focus:ring-1 focus:ring-indigo-500">
                                    <button type="button" @click="addSkill()" class="bg-indigo-600 text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-indigo-700">Ajouter</button>
                                </div>
                            </div>
                            
                            <!-- Liste des tags -->
                            <div class="flex flex-wrap gap-2 min-h-[40px] p-4 bg-slate-50 rounded-[1.5rem] border border-dashed border-slate-200">
                                <template x-for="(skill, index) in competences" :key="index">
                                    <div class="bg-white px-4 py-2 rounded-full shadow-sm border border-slate-100 flex items-center gap-2 text-xs font-semibold text-slate-700">
                                        <span x-text="skill"></span>
                                        <button type="button" @click="removeSkill(index)" class="text-slate-400 hover:text-rose-500">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <input type="hidden" name="competences[]" :value="skill">
                                    </div>
                                </template>
                                <span x-show="competences.length === 0" class="text-xs text-slate-400 italic">Aucune compétence ajoutée</span>
                            </div>
                        </div>

                        <!-- EXPÉRIENCES -->
                        <div class="space-y-6">
                            <div class="flex items-center justify-between">
                                <h2 class="text-sm font-bold uppercase tracking-widest text-indigo-600 flex items-center gap-2">
                                    <i class="fas fa-briefcase"></i> Expériences Professionnelles
                                </h2>
                                <button type="button" @click="addExperience()" class="text-xs font-bold text-indigo-600 bg-indigo-50 px-4 py-2 rounded-xl hover:bg-indigo-100 transition">
                                    + Ajouter une expérience
                                </button>
                            </div>

                            <div class="space-y-4">
                                <template x-for="(exp, index) in experiences" :key="index">
                                    <div class="p-6 rounded-[2rem] bg-slate-50/50 border border-slate-100 relative group animate-fadeIn">
                                        <button type="button" @click="removeExperience(index)" class="absolute top-4 right-4 text-slate-300 hover:text-rose-500 transition">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                            <div class="space-y-1">
                                                <label class="text-[10px] font-bold text-slate-400 ml-1">Poste</label>
                                                <input type="text" :name="'experiences['+index+'][poste]'" placeholder="Ex: Designer UI" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                                            </div>
                                            <div class="space-y-1">
                                                <label class="text-[10px] font-bold text-slate-400 ml-1">Entreprise</label>
                                                <input type="text" :name="'experiences['+index+'][entreprise]'" placeholder="Ex: Google" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                                            </div>
                                            <div class="space-y-1">
                                                <label class="text-[10px] font-bold text-slate-400 ml-1">Durée / Dates</label>
                                                <input type="text" :name="'experiences['+index+'][duree]'" placeholder="Ex: 2021 - 2023" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- FORMATIONS -->
                        <div class="space-y-6">
                            <div class="flex items-center justify-between">
                                <h2 class="text-sm font-bold uppercase tracking-widest text-indigo-600 flex items-center gap-2">
                                    <i class="fas fa-graduation-cap"></i> Formations & Diplômes
                                </h2>
                                <button type="button" @click="addFormation()" class="text-xs font-bold text-indigo-600 bg-indigo-50 px-4 py-2 rounded-xl hover:bg-indigo-100 transition">
                                    + Ajouter une formation
                                </button>
                            </div>

                            <div class="space-y-4">
                                <template x-for="(edu, index) in formations" :key="index">
                                    <div class="p-6 rounded-[2rem] bg-slate-50/50 border border-slate-100 relative group animate-fadeIn">
                                        <button type="button" @click="removeFormation(index)" class="absolute top-4 right-4 text-slate-300 hover:text-rose-500 transition">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                            <div class="space-y-1">
                                                <label class="text-[10px] font-bold text-slate-400 ml-1">Diplôme / Titre</label>
                                                <input type="text" :name="'formations['+index+'][diplome]'" placeholder="Ex: Master Informatique" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                                            </div>
                                            <div class="space-y-1">
                                                <label class="text-[10px] font-bold text-slate-400 ml-1">École / Université</label>
                                                <input type="text" :name="'formations['+index+'][ecole]'" placeholder="Ex: Sorbonne" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                                            </div>
                                            <div class="space-y-1">
                                                <label class="text-[10px] font-bold text-slate-400 ml-1">Année</label>
                                                <input type="text" :name="'formations['+index+'][annee]'" placeholder="Ex: 2020" class="w-full bg-white border-none rounded-xl py-2 px-4 text-sm">
                                            </div>
                                        </div>
                                    </div>
                                </template>
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
                            <img id="preview-mini" src="https://ui-avatars.com/api/?name=&background=fff&color=6366f1" class="w-20 h-20 rounded-[1.5rem] border-2 border-indigo-400/30 object-cover shadow-lg">
                            <div>
                                <h3 class="font-bold text-lg"></h3>
                                <p class="text-indigo-200 text-xs font-medium">Profil en cours...</p>
                            </div>
                            
                            <div class="pt-4 border-t border-indigo-500/50 space-y-3">
                                <div class="flex justify-between text-[10px] font-bold italic">
                                    <span>Force du profil</span>
                                    <span x-text="calculateStrength() + '%'"></span>
                                </div>
                                <div class="w-full bg-indigo-800 rounded-full h-1.5">
                                    <div class="bg-emerald-400 h-full rounded-full transition-all duration-500" :style="'width:' + calculateStrength() + '%'"></div>
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
    function profileEditor() {
        return {
            newSkill: '',
            competences: [],
            experiences: [
                { poste: '', entreprise: '', duree: '' }
            ],
            formations: [
                { diplome: '', ecole: '', annee: '' }
            ],

            // Gestion Compétences
            addSkill() {
                if (this.newSkill.trim() !== '') {
                    this.competences.push(this.newSkill.trim());
                    this.newSkill = '';
                }
            },
            removeSkill(index) {
                this.competences.splice(index, 1);
            },

            // Gestion Expériences
            addExperience() {
                this.experiences.push({ poste: '', entreprise: '', duree: '' });
            },
            removeExperience(index) {
                this.experiences.splice(index, 1);
            },

            // Gestion Formations
            addFormation() {
                this.formations.push({ diplome: '', ecole: '', annee: '' });
            },
            removeFormation(index) {
                this.formations.splice(index, 1);
            },

            // Calcul de progression (exemple simple)
            calculateStrength() {
                let strength = 20;
                if (this.competences.length > 0) strength += 20;
                if (this.experiences.length > 1) strength += 30;
                if (this.formations.length > 0) strength += 30;
                return Math.min(strength, 100);
            }
        }
    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview-mini').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
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