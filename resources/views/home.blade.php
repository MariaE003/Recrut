@extends('base')

@section('contenu')
<div class="bg-[#F8FAFC] min-h-screen">
    <div class="max-w-[1440px] mx-auto px-6 py-8">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- COLONNE CENTRALE : Flux de profils -->
            <div class="flex-1 space-y-8">
                <!-- Filtres style "Tabs" de l'image -->
                <!-- <div class="bg-white p-2 rounded-[2rem] shadow-sm flex gap-2">
                    <button class="flex-1 py-4 px-2 text-center text-sm font-bold text-slate-500 hover:bg-slate-50 rounded-[1.5rem] transition-all">52,844 Followers</button>
                    <button class="flex-1 py-4 px-2 text-center text-sm font-bold bg-indigo-600 text-white shadow-lg shadow-indigo-100 rounded-[1.5rem] transition-all">2,564 Following</button>
                    <button class="flex-1 py-4 px-2 text-center text-sm font-bold text-slate-500 hover:bg-slate-50 rounded-[1.5rem] transition-all">Suggestions</button>
                </div> -->
                <form method="GET" action="" class="relative mb-6">
                    <span class="absolute inset-y-0 left-4 flex items-center text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </span>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Rechercher par nom, spécialité..."
                        class="w-full bg-slate-50 border-none rounded-xl py-2 pl-10 pr-4 text-sm
                               focus:ring-1 focus:ring-indigo-500"
                    >
                </form>


                <!-- Grille des cartes -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($amis as $ami)
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100 
            hover:shadow-md transition flex flex-col gap-4">

    <!-- Ligne principale -->
    <div class="flex items-center gap-4">
        
        <!-- Avatar -->
        <div class="relative">
            <img src="{{ $ami->photo }}"
                 class="w-14 h-14 rounded-full object-cover">
            <span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 
                         border-2 border-white rounded-full"></span>
        </div>

        <!-- Infos -->
        <div class="flex-1">
            <h3 class="font-semibold text-slate-800 text-sm">
                {{ $ami->name }}
            </h3>
            <p class="text-xs text-slate-400">
                {{ $ami->specialite }}
            </p>

            <!-- Social icons -->
            <div class="flex gap-2 mt-2 text-slate-400">
               <p><svg width="14px" height="14px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5.36328 12.0523C4.01081 11.5711 3.33457 11.3304 3.13309 10.9655C2.95849 10.6492 2.95032 10.2673 3.11124 9.94388C3.29694 9.57063 3.96228 9.30132 5.29295 8.76272L17.8356 3.68594C19.1461 3.15547 19.8014 2.89024 20.2154 3.02623C20.5747 3.14427 20.8565 3.42608 20.9746 3.7854C21.1106 4.19937 20.8453 4.85465 20.3149 6.16521L15.2381 18.7078C14.6995 20.0385 14.4302 20.7039 14.0569 20.8896C13.7335 21.0505 13.3516 21.0423 13.0353 20.8677C12.6704 20.6662 12.4297 19.99 11.9485 18.6375L10.4751 14.4967C10.3815 14.2336 10.3347 14.102 10.2582 13.9922C10.1905 13.8948 10.106 13.8103 10.0086 13.7426C9.89876 13.6661 9.76719 13.6193 9.50407 13.5257L5.36328 12.0523Z" stroke="#000000" stroke-width="0.984" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> {{$ami->lieu}}</p>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex gap-2">
        <button class="flex-1 py-2 bg-indigo-600 text-white rounded-lg 
                       text-xs font-semibold hover:bg-indigo-700 transition">
            Followed
        </button>
        <button class="flex-1 py-2 bg-slate-100 text-slate-600 rounded-lg 
                       text-xs font-semibold hover:bg-slate-200 transition">
            Unfollow
        </button>
    </div>

</div>
                    @endforeach
                </div>
            </div>

            <!-- COLONNE DROITE : Amis & Activités -->
            <div class="lg:w-80 space-y-8">
                <!-- Recherche Amis -->
                <div class="bg-white rounded-[2.5rem] p-6 shadow-xl shadow-slate-200/50">
                    <div class="relative mb-6">
                        <span class="absolute inset-y-0 left-4 flex items-center text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                        <input type="text" placeholder="Rechercher amis..." class="w-full bg-slate-50 border-none rounded-xl py-2 pl-10 pr-4 text-sm focus:ring-1 focus:ring-indigo-500">
                    </div>

                    <h4 class="font-bold text-slate-800 mb-6 text-sm flex items-center justify-between">
                        Amis en ligne 
                        <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                    </h4>
                    
                    <div class="space-y-6">
                        @foreach(range(1, 6) as $index)
                        <div class="flex items-center gap-4 group cursor-pointer">
                            <div class="relative">
                                <img src="https://i.pravatar.cc/150?u={{$index}}" class="w-10 h-10 rounded-xl object-cover">
                                <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-emerald-500 border-2 border-white rounded-full"></div>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-slate-700 group-hover:text-indigo-600 transition-colors">Sarah Connor</p>
                                <p class="text-[10px] text-slate-400 font-medium tracking-tight">Il y a 2 min</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Import de FontAwesome pour les icônes sociales (à mettre dans base.blade.php idéalement) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection