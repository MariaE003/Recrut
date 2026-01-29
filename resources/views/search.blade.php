<div class="pt-24 max-w-6xl mx-auto px-6">
    <!-- Barre de recherche -->
    <div class="bg-white p-4 rounded-xl shadow-sm mb-8 flex flex-wrap gap-4 items-center">
        <input type="text" placeholder="Rechercher un nom ou une spécialité..." class="flex-1 px-4 py-2 border rounded-lg focus:ring-indigo-500 outline-none">
        <select class="px-4 py-2 border rounded-lg outline-none">
            <option>Tous les types</option>
            <option>Développeur</option>
            <option>Designer</option>
            <option>Recruteur</option>
        </select>
        <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-medium">Filtrer</button>
    </div>

    <!-- Grille de résultats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Carte Utilisateur -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
            <img src="https://i.pravatar.cc/150?u=1" class="w-24 h-24 rounded-full mx-auto mb-4 border-4 border-indigo-50">
            <h3 class="text-xl font-bold text-gray-800">Jean Dupont</h3>
            <p class="text-indigo-600 font-medium mb-4">Développeur Fullstack PHP</p>
            <div class="flex justify-center space-x-2">
                <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                    Ajouter
                </button>
                <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm">Voir Profil</button>
            </div>
        </div>
        <!-- Répéter les cartes... -->
    </div>
</div>