@extends('base')

@section('contenu')
<div class="bg-[#F1F5F9] min-h-screen py-10 px-4">
    <div class="max-w-4xl mx-auto">

        <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 overflow-hidden border border-white">
            
            <div class="h-24 bg-gradient-to-r from-indigo-500 to-purple-600"></div>
            
            <div class="px-8 pb-8">
                <div class="relative flex flex-col md:flex-row items-start md:items-end -mt-12 gap-6">
                    <div class="relative">
                        <img src="{{ $user->photo }}" 
                             class="w-32 h-32 rounded-[1.8rem] object-cover border-4 border-white shadow-lg bg-white"
                             alt="{{ $user->name }}">
                    </div>

                    <div class="flex-1">
                        <div class="flex flex-wrap items-center gap-3">
                            <h1 class="text-2xl font-black text-slate-800">{{ $user->name }}</h1>
                            <span class="px-3 py-1 {{ $user->role == 'recruteur' ? 'bg-amber-100 text-amber-600' : 'bg-indigo-100 text-indigo-600' }} rounded-full text-[11px] font-bold uppercase tracking-wider">
                                {{ $user->role }}
                            </span>
                        </div>
                        <p class="text-indigo-600 font-bold text-sm mt-1">{{ $user->specialite }}</p>
                    </div>

                    <div class="flex gap-2">
                        <button class="p-3 bg-slate-50 text-slate-400 rounded-xl hover:text-indigo-600 transition-all border border-slate-100">
                            <i class="fas fa-envelope"></i>
                        </button>
                        <button class="px-5 py-3 bg-indigo-600 text-white rounded-xl font-bold text-sm shadow-md hover:bg-indigo-700 transition-all">
                            Suivre
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
                    
                    <div class="space-y-4">
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <p class="text-[10px] font-black text-slate-400 uppercase mb-2">Contact & Lieu</p>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3 text-slate-600">
                                    <i class="fas fa-at text-indigo-500 text-xs"></i>
                                    <span class="text-xs font-semibold truncate">{{ $user->email }}</span>
                                </div>
                                <div class="flex items-center gap-3 text-slate-600">
                                    <i class="fas fa-map-marker-alt text-rose-500 text-xs"></i>
                                    <span class="text-xs font-semibold">{{ $user->lieu }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="flex justify-between p-4 border border-slate-100 rounded-2xl">
                            <div class="text-center">
                                <p class="text-sm font-black text-slate-800">1.2k</p>
                                <p class="text-[9px] text-slate-400 font-bold uppercase">Amis</p>
                            </div>
                            <div class="w-px h-8 bg-slate-100"></div>
                            <div class="text-center">
                                <p class="text-sm font-black text-slate-800">45</p>
                                <p class="text-[9px] text-slate-400 font-bold uppercase">Posts</p>
                            </div>
                        </div> -->
                    </div>

                    <div class="md:col-span-2 space-y-4">
                        <div class="p-6 bg-white border border-slate-100 rounded-[2rem]">
                            <h3 class="text-sm font-black text-slate-800 mb-3 flex items-center gap-2">
                                <span class="w-1.5 h-4 bg-indigo-600 rounded-full"></span>
                                À propos de moi
                            </h3>
                            <p class="text-slate-500 text-sm leading-relaxed">
                                {{ $user->bio }}
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-center">
            <a href="{{ url()->previous() }}" class="text-slate-400 hover:text-indigo-600 text-xs font-bold flex items-center gap-2 transition-all">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
    </div>
</div>
@endsection