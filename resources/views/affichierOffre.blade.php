@extends('base')

@section('contenu')

<body class="bg-[#F8FAFC] min-h-screen">

    <div class="max-w-[1440px] mx-auto px-6 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Barre latérale de filtres -->
            <div class="lg:w-64 space-y-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <h3 class="font-bold text-slate-800 mb-4 text-sm">Filtres</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Type de contrat</label>
                            <div class="mt-2 space-y-2">
                                <label class="flex items-center text-sm text-slate-600"><input type="checkbox" class="mr-2 rounded border-slate-300 text-indigo-600"> CDI</label>
                                <label class="flex items-center text-sm text-slate-600"><input type="checkbox" class="mr-2 rounded border-slate-300 text-indigo-600"> Freelance</label>
                                <label class="flex items-center text-sm text-slate-600"><input type="checkbox" class="mr-2 rounded border-slate-300 text-indigo-600"> Stage</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenu principal -->
            <div class="flex-1">
                <!-- Barre de recherche -->
                <div class="relative mb-8">
                    <span class="absolute inset-y-0 left-4 flex items-center text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                    <input type="text" placeholder="Rechercher un métier, une entreprise..." 
                        class="w-full bg-white border-none rounded-xl py-3 pl-12 pr-4 text-sm shadow-sm focus:ring-1 focus:ring-indigo-500">
                </div>

                <!-- Grille d'offres -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    
                    <!-- Carte Offre 1 (Exemple) -->
                     @foreach($offres as $offre)
                        <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-md transition flex flex-col">
                            <!-- Image de l'offre -->
                            <div class="h-32 w-full relative">
                                <!-- <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=500" class="w-full h-full object-cover" alt="Poste"> -->
                                <img src="{{asset('storage/'.$offre->photo)}}" class="w-full h-full object-cover" alt="Poste">
                                <span class="absolute top-3 right-3 bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-lg">{{$offre->typeContrat}}</span>
                            </div>
                            
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <!-- <img src="https://logo.clearbit.com/google.com" class="w-10 h-10 rounded-lg border border-slate-50"> -->
                                    <div>
                                        <h3 class="font-bold text-slate-800 text-sm">{{$offre->titre}}</h3>
                                        <p class="text-xs text-slate-400 font-medium">{{$offre->entrepriseName}}</p>
                                    </div>
                                </div>

                                <p class="text-xs text-slate-500 line-clamp-2 mb-4">
                                    <!-- Nous recherchons un designer passionné pour rejoindre notre équipe à Paris et travailler sur des projets innovants... -->
                                     {{$offre->description}}
                                </p>

                                <!-- <div class="flex items-center gap-3 text-slate-600 mb-5">
                                    <i class="fas fa-map-marker-alt text-rose-500 text-xs"></i>
                                    <span class="text-xs font-semibold">Paris, FR</span>
                                </div> -->

                                <div class="mt-auto flex gap-2">
                                    <button class="flex-1 py-2 bg-slate-100 text-slate-600 rounded-lg text-xs font-semibold hover:bg-slate-200 transition">
                                        Voir Détails
                                    </button>
                                    <button class="flex-1 py-2 bg-indigo-600 text-white rounded-lg text-xs font-semibold hover:bg-indigo-700 transition">
                                        Postuler
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Carte Offre 2 (Exemple) -->
                    <!-- <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-md transition flex flex-col">
                        <div class="h-32 w-full relative">
                            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=500" class="w-full h-full object-cover" alt="Poste">
                            <span class="absolute top-3 right-3 bg-emerald-500 text-white text-[10px] font-bold px-2 py-1 rounded-lg">Freelance</span>
                        </div>
                        
                        <div class="p-5 flex flex-col flex-1">
                            <div class="flex items-center gap-3 mb-3">
                                <img src="https://logo.clearbit.com/github.com" class="w-10 h-10 rounded-lg border border-slate-50">
                                <div>
                                    <h3 class="font-bold text-slate-800 text-sm">Fullstack Laravel Developer</h3>
                                    <p class="text-xs text-slate-400 font-medium">GitHub</p>
                                </div>
                            </div>

                            <p class="text-xs text-slate-500 line-clamp-2 mb-4">
                                Rejoignez l'équipe technique pour maintenir et faire évoluer nos API internes. Maîtrise de PHP 8 et Vue.js exigée.
                            </p>

                            <div class="flex items-center gap-3 text-slate-600 mb-5">
                                <i class="fas fa-map-marker-alt text-rose-500 text-xs"></i>
                                <span class="text-xs font-semibold">Remote</span>
                            </div>

                            <div class="mt-auto flex gap-2">
                                <button class="flex-1 py-2 bg-slate-100 text-slate-600 rounded-lg text-xs font-semibold hover:bg-slate-200 transition">
                                    Voir Détails
                                </button>
                                <button class="flex-1 py-2 bg-indigo-600 text-white rounded-lg text-xs font-semibold hover:bg-indigo-700 transition">
                                    Postuler
                                </button>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
@endsection