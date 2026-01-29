<div class="pt-24 max-w-2xl mx-auto px-6">
    <div class="bg-white p-8 rounded-2xl shadow-sm">
        <h2 class="text-2xl font-bold mb-6">Paramètres du profil</h2>
        <form class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Photo de profil</label>
                <div class="flex items-center space-x-4">
                    <img src="https://i.pravatar.cc/150?u=5" class="w-16 h-16 rounded-full">
                    <input type="file" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" value="Sara" class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Spécialité</label>
                    <input type="text" value="Recruteur" class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-indigo-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea rows="3" class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-indigo-500 outline-none"></textarea>
            </div>

            <hr>
            <h3 class="font-bold text-red-600">Sécurité</h3>
            <div>
                <label class="block text-sm font-medium text-gray-700">Ancien mot de passe</label>
                <input type="password" class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                <input type="password" class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-indigo-500 outline-none">
            </div>

            <button class="w-full bg-indigo-600 text-white py-3 rounded-xl font-bold">Enregistrer les modifications</button>
        </form>
    </div>
</div>