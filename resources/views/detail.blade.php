@extends('base')

@section('contenu')
<div class="bg-[#F8FAFC] min-h-screen">
    <!-- Header du profil avec Couverture -->
    <div class="max-w-[1440px] mx-auto px-6 pt-8">
        <div class="relative">
            <!-- Image de Couverture -->
            <div class="h-64 w-full rounded-[2.5rem] overflow-hidden shadow-lg relative">
                <img src="https://images.unsplash.com/photo-1557683316-973673baf926?q=80&w=2070" class="w-full h-full object-cover" alt="Cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            </div>

            <!-- Infos principales (Avatar + Nom + Actions) -->
            <div class="flex flex-col md:flex-row items-end px-10 -mt-16 pb-6 gap-6">
                <!-- Avatar -->
                <div class="relative">
                    <img src="{{ $ami->photo }}" 
                         class="w-40 h-40 rounded-[2.5rem] object-cover border-8 border-white shadow-xl">
                    <span class="absolute bottom-4 right-4 w-6 h-6 bg-emerald-500 border-4 border-white rounded-full shadow-sm"></span>
                </div>

                <!-- Nom et Titre -->
                <div class="flex-1 pb-4">
                    <h1 class="text-3xl font-black text-slate-800">{{ $ami->name }}</h1>
                    <p class="text-indigo-600 font-bold flex items-center gap-2">
                        {{ $ami->specialite }} 
                        <span class="text-slate-300">•</span>
                        <span class="text-slate-400 font-medium text-sm">{{ $ami->lieu }}</span>
                    </p>
                </div>

                <!-- Boutons d'action -->
                <div class="flex gap-3 pb-4">
                    <button class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all flex items-center gap-2">
                        <i class="fas fa-user-plus text-sm"></i> Suivre
                    </button>
                    <button class="px-6 py-3 bg-white text-slate-600 border border-slate-100 rounded-2xl font-bold shadow-sm hover:bg-slate-50 transition-all">
                        Message
                    </button>
                    <button class="p-3 bg-white text-slate-400 border border-slate-100 rounded-2xl hover:text-indigo-600 transition-all">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[1440px] mx-auto px-6 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- COLONNE GAUCHE : Infos & Stats (33%) -->
            <div class="lg:w-1/3 space-y-8">
                <!-- Carte Bio/About -->
                <div class="bg-white rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 border border-white">
                    <h4 class="font-bold text-slate-800 mb-4 text-lg">À propos</h4>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6">
                        Passionné par le design et le développement, je travaille sur des projets innovants depuis plus de 5 ans. Toujours à la recherche de nouveaux défis techniques.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 text-slate-600">
                            <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-500 text-sm">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span class="text-sm font-semibold">contact@hellomail.com</span>
                        </div>
                        <div class="flex items-center gap-4 text-slate-600">
                            <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-500 text-sm">
                                <i class="fas fa-link"></i>
                            </div>
                            <span class="text-sm font-semibold italic text-indigo-600">mon-portfolio.com</span>
                        </div>
                    </div>
                </div>

                <!-- Carte Statistiques -->
                <div class="bg-white rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 border border-white">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <p class="text-2xl font-black text-slate-800">128</p>
                            <p class="text-[10px] uppercase tracking-wider font-bold text-slate-400">Posts</p>
                        </div>
                        <div class="border-x border-slate-100">
                            <p class="text-2xl font-black text-slate-800">12k</p>
                            <p class="text-[10px] uppercase tracking-wider font-bold text-slate-400">Followers</p>
                        </div>
                        <div>
                            <p class="text-2xl font-black text-slate-800">850</p>
                            <p class="text-[10px] uppercase tracking-wider font-bold text-slate-400">Suivis</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLONNE DROITE : Feed/Activités (66%) -->
            <div class="flex-1 space-y-8">
                <!-- Onglets (Reprise de votre design) -->
                <div class="bg-white p-2 rounded-[2rem] shadow-sm flex gap-2">
                    <button class="flex-1 py-4 px-2 text-center text-sm font-bold bg-indigo-600 text-white shadow-lg shadow-indigo-100 rounded-[1.5rem] transition-all">Timeline</button>
                    <button class="flex-1 py-4 px-2 text-center text-sm font-bold text-slate-500 hover:bg-slate-50 rounded-[1.5rem] transition-all">Photos</button>
                    <button class="flex-1 py-4 px-2 text-center text-sm font-bold text-slate-500 hover:bg-slate-50 rounded-[1.5rem] transition-all">Amis</button>
                </div>

                <!-- Exemple de Post ou Contenu -->
                <div class="space-y-6">
                    @foreach(range(1, 3) as $post)
                    <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100">
                        <div class="flex items-center gap-4 mb-6">
                            <img src="{{ $ami->photo }}" class="w-12 h-12 rounded-2xl object-cover">
                            <div>
                                <h3 class="font-bold text-slate-800 text-sm">{{ $ami->name }}</h3>
                                <p class="text-xs text-slate-400 font-medium">Posté il y a 2 heures</p>
                            </div>
                        </div>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6">
                            C'est incroyable de voir comment le design peut transformer une expérience utilisateur. Voici un aperçu de mon dernier projet sur lequel je travaille !
                        </p>
                        <div class="h-80 w-full rounded-[2rem] bg-slate-100 overflow-hidden">
                             <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=2072" class="w-full h-full object-cover">
                        </div>
                        
                        <div class="flex items-center gap-6 mt-6 pt-6 border-t border-slate-50">
                            <button class="flex items-center gap-2 text-slate-400 hover:text-rose-500 transition-colors">
                                <i class="far fa-heart text-lg"></i>
                                <span class="text-sm font-bold">2.4k</span>
                            </button>
                            <button class="flex items-center gap-2 text-slate-400 hover:text-indigo-600 transition-colors">
                                <i class="far fa-comment text-lg"></i>
                                <span class="text-sm font-bold">148</span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection