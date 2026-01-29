<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- role -->
        <div>
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="block mt-1 w-full" required>
                <option value="">-- Choisir un rôle --</option>
                <option value="chercheur">Chercheur </option>
                <option value="recruteur">Recruteur </option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>


        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- bio -->
        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <textarea id="bio" class="block mt-1 w-full" type="text" name="bio" :value="old('bio')" required autofocus autocomplete="bio" ></textarea>
            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
        </div>
        <!-- photo -->
        <div>
            <x-input-label for="photo" :value="__('Photo')" />
            <x-text-input id="photo" class="block mt-1 w-full" type="url" name="photo" :value="old('photo')" required autofocus autocomplete="photo" />
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- specialite -->

        <div class="mt-4">
            <x-input-label for="specialite" :value="__('Specialite')" />
            <x-text-input id="specialite" class="block mt-1 w-full" type="text" name="specialite" :value="old('specialite')" required  />
            <x-input-error :messages="$errors->get('specialite')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
