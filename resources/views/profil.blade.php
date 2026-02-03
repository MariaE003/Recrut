@extends('base')

@section('contenu')
<div class="bg-[#F8FAFC] min-h-screen">
    <div class="max-w-[1440px] mx-auto px-6 py-8">
        
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- COLONNE GAUCHE : Formulaire de création -->
            <div class="flex-1 space-y-8">
                
                <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100">
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold text-slate-800">Compléter mon profil professionnel</h1>
                        <p class="text-slate-500 text-sm">Ces informations permettront aux recruteurs de vous trouver.</p>
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                        @csrf
                        
                        <!-- SECTION : Identité & Photo -->
                        <div class="space-y-6">
                            <h2 class="text-sm font-bold uppercase tracking-wider text-indigo-600 flex items-center gap-2">
                                <i class="fas fa-user-circle"></i> Informations de base
                            </h2>
                            
                            <div class="flex flex-col md:flex-row gap-8 items-start">
                                <!-- Upload Photo -->
                                <div class="relative group">
                                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-lg bg-slate-100">
                                        <img id="preview" src="https://ui-avatars.com/api/?name=User&background=EEF2FF&color=4F46E5" class="w-full h-full object-cover">
                                    </div>
                                    <label class="absolute bottom-0 right-0 bg-indigo-600 text-white p-2 rounded-full cursor-pointer hover:bg-indigo-700 transition shadow-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        <input type="file" name="photo" class="hidden" onchange="previewImage(this)">
                                    </label>
                                </div>

                                <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
                                    <div class="space-y-2">
                                        <label class="text-xs font-bold text-slate-700 ml-1">Nom complet</label>
                                        <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full bg-slate-50 border-none rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500/20">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-xs font-bold text-slate-700 ml-1">Titre du profil (Ex: Développeur Fullstack)</label>
                                        <input type="text" name="specialite" placeholder="Votre métier principal" class="w-full bg-slate-50 border-none rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500/20">
                                    </div>
                                    <div class="space-y-2 md:col-span-2">
                                        <label class="text-xs font-bold text-slate-700 ml-1">Bio courte</label>
                                        <textarea name="bio" rows="2" class="w-full bg-slate-50 border-none rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500/20" placeholder="Parlez-nous de vous en quelques mots..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="border-slate-100">

                        <!-- SECTION : Localisation & Détails -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-700 ml-1 flex items-center gap-2">
                                    <i class="fas fa-map-marker-alt text-rose-500"></i> Localisation
                                </label>
                                <input type="text" name="lieu" placeholder="Ville, Pays" class="w-full bg-slate-50 border-none rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500/20">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-700 ml-1 flex items-center gap-2">
                                    <i class="fas fa-tools text-indigo-500"></i> Compétences (séparées par des virgules)
                                </label>
                                <input type="text" name="competences" placeholder="PHP, Laravel, Design UI..." class="w-full bg-slate-50 border-none rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500/20">
                            </div>
                        </div>

                        <!-- SECTION : Formations & Expériences -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Bloc Formation -->
                            <div class="space-y-4">
                                <h3 class="text-sm font-bold text-slate-800 flex items-center justify-between">
                                    <span><i class="fas fa-graduation-cap mr-2 text-indigo-500"></i> Formation</span>
                                    <button type="button" class="text-indigo-600 hover:text-indigo-700 text-xs">+ Ajouter</button>
                                </h3>
                                <div class="bg-slate-50 p-4 rounded-2xl space-y-3">
                                    <input type="text" placeholder="Diplôme ou école" class="w-full bg-white border-none rounded-lg py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500">
                                    <input type="text" placeholder="Année" class="w-full bg-white border-none rounded-lg py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500">
                                </div>
                            </div>

                            <!-- Bloc Expérience -->
                            <div class="space-y-4">
                                <h3 class="text-sm font-bold text-slate-800 flex items-center justify-between">
                                    <span><i class="fas fa-briefcase mr-2 text-indigo-500"></i> Expériences</span>
                                    <button type="button" class="text-indigo-600 hover:text-indigo-700 text-xs">+ Ajouter</button>
                                </h3>
                                <div class="bg-slate-50 p-4 rounded-2xl space-y-3">
                                    <input type="text" placeholder="Poste occupé" class="w-full bg-white border-none rounded-lg py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500">
                                    <input type="text" placeholder="Entreprise & Durée" class="w-full bg-white border-none rounded-lg py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500">
                                </div>
                            </div>
                        </div>

                        <!-- BOUTON DE SAUVEGARDE -->
                        <div class="pt-6">
                            <button type="submit" class="w-full md:w-auto px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all transform hover:-translate-y-1">
                                Enregistrer mon profil professionnel
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- COLONNE DROITE : Preview & Conseils -->
            <div class="lg:w-96 space-y-8">
                <!-- Preview de la carte (Comme dans votre exemple) -->
                <div class="bg-white rounded-[2.5rem] p-6 shadow-xl shadow-slate-200/50">
                    <h4 class="font-bold text-slate-800 mb-6 text-sm">Aperçu de votre carte</h4>
                    
                    <div class="bg-white rounded-xl p-5 border border-slate-100 shadow-sm flex flex-col gap-4">
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <img src="https://ui-avatars.com/api/?name=User&background=EEF2FF&color=4F46E5" class="w-14 h-14 rounded-full object-cover">
                                <span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-white rounded-full"></span>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-slate-800 text-sm" id="prev-name">{{ auth()->user()->name }}</h3>
                                <p class="text-xs text-slate-400">Spécialité à définir</p>
                                <div class="flex items-center gap-3 text-slate-600 mt-2">
                                    <i class="fas fa-map-marker-alt text-rose-500 text-[10px]"></i>
                                    <span class="text-[10px] font-semibold">Lieu non défini</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 py-2 bg-slate-100 text-slate-600 rounded-lg text-xs font-semibold">Détails</button>
                            <button class="w-1/3 py-2 bg-indigo-600 text-white rounded-lg text-xs font-semibold">Suivre</button>
                        </div>
                    </div>

                    <div class="mt-8 p-4 bg-indigo-50 rounded-2xl">
                        <h5 class="text-xs font-bold text-indigo-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-lightbulb"></i> Conseil de pro
                        </h5>
                        <p class="text-[11px] text-indigo-600/80 leading-relaxed">
                            Un profil avec une photo professionnelle et une spécialité claire reçoit 70% de visites en plus de la part des recruteurs.
                        </p>
                    </div>
                </div>

                <!-- Aide/Support -->
                <div class="bg-slate-800 rounded-[2.5rem] p-8 text-white">
                    <h4 class="font-bold mb-4 text-sm">Besoin d'aide ?</h4>
                    <p class="text-xs text-slate-400 mb-6 leading-relaxed">Notre équipe est là pour vous aider à optimiser votre CV en ligne.</p>
                    <a href="#" class="text-xs font-bold text-indigo-400 hover:text-indigo-300 transition">Contacter le support →</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Petit script pour la preview de l'image
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection