@extends('base')

@section('contenu')

<body class="bg-slate-50 font-sans antialiased text-slate-800">

<div class="max-w-5xl mx-auto px-4 py-8">

    <!-- Bouton Retour -->
    <a href=""
       class="inline-flex items-center text-slate-500 hover:text-indigo-600 mb-6 transition-colors group">
        <i class="fas fa-arrow-left mr-2 text-sm group-hover:-translate-x-1 transition-transform"></i>
        <span class="text-sm font-semibold">Retour aux offres</span>
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Colonne Gauche -->
        <div class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">

                <!-- Image -->
                <div class="h-48 w-full relative">
                    <img src="{{ asset('storage/'.$offre->photo) }}"
                         class="w-full h-full object-cover" alt="Offre">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>

                    <span class="absolute bottom-4 left-6 bg-indigo-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg">
                        {{ $offre->typeContrat }}
                    </span>
                </div>

                <div class="p-6 md:p-8">

                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                        <div>
                            <h1 class="text-2xl font-extrabold text-slate-800 mb-2">
                                {{ $offre->titre }}
                            </h1>

                            <div class="flex items-center gap-4 text-slate-500 text-sm">
                                <span class="flex items-center">
                                    <i class="far fa-building mr-2"></i>
                                    {{ $offre->entrepriseName }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Infos rapides -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">

                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                            <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold mb-1">
                                Type
                            </p>
                            <p class="text-sm font-bold text-slate-700">
                                {{ $offre->typeContrat }}
                            </p>
                        </div>

                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                            <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold mb-1">
                                Statut
                            </p>
                            <p class="text-sm font-bold text-slate-700">
                                {{ $offre->cloturer ? 'Clôturée' : 'Ouverte' }}
                            </p>
                        </div>

                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                            <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold mb-1">
                                Publiée
                            </p>
                            <p class="text-sm font-bold text-slate-700">
                                {{ $offre->created_at->diffForHumans() }}
                            </p>
                        </div>

                    </div>

                    <!-- Description -->
                    <div class="prose prose-slate max-w-none">
                        <h3 class="text-lg font-bold text-slate-800 mb-4">
                            Description du poste
                        </h3>

                        <p class="text-slate-600 leading-relaxed mb-6">
                            {{ $offre->description }}
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">

            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 sticky top-6">
                <h3 class="font-bold text-slate-800 mb-4">
                    Cette offre vous intéresse ?
                </h3>

                <button
                    class="w-full py-3 bg-indigo-600 text-white rounded-xl text-sm font-bold hover:bg-indigo-700 transition">
                    Postuler maintenant
                </button>

                <hr class="my-6 border-slate-100">

                <div class="flex items-center gap-4">
                    <div
                        class="h-12 w-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 font-bold">
                        {{ strtoupper(substr($offre->entrepriseName,0,2)) }}
                    </div>
                    <div>
                        <p class="text-sm font-bold text-slate-800">
                            {{ $offre->entrepriseName }}
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

</body>
@endsection
