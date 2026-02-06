<div>
    <input type="text" wire:model.live="search" placeholder="Rechercher un métier ou entreprise..."
        class="w-full bg-white border-none rounded-xl py-3 pl-4 pr-4 text-sm shadow-sm focus:ring-1 focus:ring-indigo-500 mb-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <label><input type="checkbox" value="CDI" wire:model="typeContratFilter"> CDI</label>
    <label><input type="checkbox" value="CDD" wire:model="typeContratFilter"> CDD</label>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mt-4">
        @foreach($offre as $offre)
            <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-md transition flex flex-col">
                <div class="h-32 w-full relative">
                    <img src="{{ asset('storage/'.$offre->photo) }}" class="w-full h-full object-cover" alt="Poste">
                    <span class="absolute top-3 right-3 bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-lg">{{$offre->typeContrat}}</span>
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <div>
                            <h3 class="font-bold text-slate-800 text-sm">{{$offre->titre}}</h3>
                            <p class="text-xs text-slate-400 font-medium">{{$offre->entrepriseName}}</p>
                        </div>
                    </div>
                    <p class="text-xs text-slate-500 line-clamp-2 mb-4">{{$offre->description}}</p>
                    <div class="mt-auto flex gap-2">
                        <a href="/detailoffre/{{$offre->id}}" class="text-center flex-1 py-2 bg-slate-100 text-slate-600 rounded-lg text-xs font-semibold hover:bg-slate-200 transition">
                            Voir Détails
                        </a>
                        @if($offre->isApplied)
                            <span  class="flex-1 py-2 text-center bg-green-500 text-white rounded-lg text-xs font-semibold hover:bg-indigo-700 transition">
                                Deja Postuler
                            </span>
                        @elseif($offre->iscloture)
                            <span  class="flex-1 py-2 text-center bg-red-300 text-white rounded-lg text-xs font-semibold hover:bg-indigo-700 transition">
                                Cloturer
                            </span>
                        @else
                            <a href="poustule/{{$offre->id}}"  class="flex-1 py-2 text-center bg-indigo-600 text-white rounded-lg text-xs font-semibold hover:bg-indigo-700 transition">
                                Postuler
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
