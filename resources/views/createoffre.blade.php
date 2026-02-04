@extends('base')

@section('contenu')

<body class="bg-[#F8FAFC] min-h-screen">

    <div class="max-w-[1440px] mx-auto px-6 py-8">
        <div class="max-w-3xl mx-auto">
            <!-- Header de la page -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-slate-800">Publier une nouvelle offre</h1>
                <p class="text-slate-500 text-sm">Trouvez votre prochain talent en quelques minutes.</p>
            </div>

            <!-- Formulaire -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
                <form action="{{route('create.offre')}}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    <!-- Ligne 1: Titre du poste -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Titre du poste *</label>
                        <input type="text" placeholder="Ex: Développeur Fullstack React/Laravel"  name="titre"
                            class="w-full bg-slate-50 border-none rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <!-- Ligne 2: Entreprise et Type de contrat -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Nom de l'entreprise *</label>
                            <input type="text" placeholder="Ex: Tech Corp" name="entrepriseName"
                                class="w-full bg-slate-50 border-none rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Type de contrat *</label>
                            <select name="typeContrat" class="w-full bg-slate-50 border-none rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500 appearance-none">
                                <option>CDI</option>
                                <option>CDD</option>
                                <option>Freelance</option>
                                <option>Stage</option>
                                <option>Alternance</option>
                            </select>
                        </div>
                    </div>
                    <!-- image -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Image d'illustration (Obligatoire)</label>
                        
                        <!-- On utilise un <label> pour que tout le clic déclenche l'input -->
                        <label for="image-upload" class="relative border-2 border-dashed border-slate-200 rounded-xl p-8 text-center hover:border-indigo-400 hover:bg-indigo-50/30 transition cursor-pointer bg-slate-50 flex flex-col items-center justify-center">
                            
                            <!-- L'input réel est caché ici -->
                            <input type="file" id="image-upload" name="photo" class="hidden" accept="image/*" onchange="updateFileName(this)">
                            
                            <div id="upload-placeholder">
                                <i class="fas fa-cloud-upload-alt text-3xl text-slate-400 mb-2"></i>
                                <p class="text-sm text-slate-500">Cliquez pour ajouter une image ou glissez-déposez</p>
                                <p class="text-xs text-slate-400 mt-1">PNG, JPG jusqu'à 5MB</p>
                            </div>

                            <!-- Zone pour afficher l'aperçu ou le nom du fichier après sélection -->
                            <div id="file-chosen" class="hidden flex flex-col items-center">
                                <i class="fas fa-file-image text-3xl text-indigo-500 mb-2"></i>
                                <p id="file-name" class="text-sm font-medium text-slate-700"></p>
                                <p class="text-xs text-indigo-600 mt-1 font-semibold">Cliquer pour changer d'image</p>
                            </div>
                        </label>
                    </div>

                    <script>
                    function updateFileName(input) {
                        const placeholder = document.getElementById('upload-placeholder');
                        const fileChosen = document.getElementById('file-chosen');
                        const fileNameDisplay = document.getElementById('file-name');

                        if (input.files && input.files[0]) {
                            // On affiche le nom du fichier
                            fileNameDisplay.textContent = input.files[0].name;
                            
                            // On bascule les visuels
                            placeholder.classList.add('hidden');
                            fileChosen.classList.remove('hidden');
                        }
                    }
                    </script>

                    <!-- Ligne 4: Description -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Description du poste</label>
                        <textarea rows="6" name="description" placeholder="Décrivez les missions, les compétences requises..." 
                            class="w-full bg-slate-50 border-none rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-indigo-500"></textarea>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-slate-100">
                        <button type="button" class="px-6 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-100 rounded-xl transition">
                            Annuler
                        </button>
                        <button type="submit" class="px-8 py-2.5 bg-indigo-600 text-white text-sm font-semibold rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-100 transition">
                            Publier l'offre
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection