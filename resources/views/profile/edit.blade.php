@extends('base')
@section('contenu')
<div class="max-w-6xl mx-auto px-6 pt-10 pb-20">

    <div class="flex flex-col lg:flex-row gap-8">
        
        
        <div class="flex-1">
            <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                <!-- Section 1: Identité -->
                <div class="bg-white rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 border border-slate-100">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-xl font-bold text-slate-800">Profil Public</h2>
                    </div>

                    <div class="space-y-6">
                        <!-- Photo Upload -->
                        <div class="flex items-center gap-6 pb-6 border-b border-slate-50">
                            <div class="relative group">
                                <img id="preview" src="{{$user->photo}}" class="w-24 h-24 rounded-3xl object-cover border-4 border-indigo-50">
                            </div>
                        </div>

                        <!-- Grille de champs -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Nom Complet</label>
                                <input type="text" value="{{ $user->name }}" class="w-full bg-slate-50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 transition-all font-medium text-slate-600 shadow-sm" placeholder="Ex: marie robbensen" name="name">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Adresse Email</label>
                                <input type="email" value="{{ $user->email }}" class="w-full bg-slate-50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 transition-all font-medium text-slate-600 shadow-sm" placeholder="marie@talentia.com" name="email">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Photo</label>
                                <input type="url" name="photo" class="w-full bg-slate-50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 transition-all font-medium text-slate-600 shadow-sm" placeholder="https://i.pinimg.com/1200.jpg"  value="{{$user->photo}}">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Lieu</label>
                                <input type="text" name="lieu" class="w-full bg-slate-50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 transition-all font-medium text-slate-600 shadow-sm" placeholder="casablanca"  value="{{$user->lieu}}">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Spécialité </label>
                                <input type="text" class="w-full bg-slate-50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 transition-all font-medium text-slate-600 shadow-sm" placeholder="Ex: Développement Web" name="specialite" value="{{$user->specialite}}">
                            </div>
                        </div>

                        <!-- Bio -->
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 ml-1">Biographie</label>
                            <textarea rows="4" class="w-full bg-slate-50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 transition-all font-medium text-slate-600 shadow-sm" placeholder="Décrivez votre parcours..." name="bio">{{ $user->bio }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Sécurité (Mot de passe) -->
                <div class="bg-white rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 border border-slate-100">
                    <h2 class="text-xl font-bold text-slate-800 mb-8 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Changer le mot de passe
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        @error('password')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 ml-1">Ancien mot de passe</label>
                            <input name="ancienPassword" type="password" class="w-full bg-slate-50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 transition-all font-medium shadow-sm">
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 ml-1">Nouveau mot de passe</label>
                            <input type="password" class="w-full bg-slate-50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 transition-all font-medium shadow-sm" name="password">
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="flex items-center justify-end gap-4 mt-10">
                    <button type="button" class="px-8 py-4 rounded-2xl font-bold text-slate-500 hover:bg-slate-100 transition-all">Annuler</button>
                    <button type="submit" class="px-10 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all">Sauvegarder les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection