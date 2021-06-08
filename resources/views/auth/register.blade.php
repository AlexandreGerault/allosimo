<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <div>
                <x-label for="name" value="Nom et prénom"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" value="Adresse mail"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            </div>

            <!-- Phone Number -->
            <div class="mt-4">
                <x-label for="phone" value="Téléphone"/>

                <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required/>
            </div>

            <!-- Town -->
            <div class="mt-4">
                <x-label for="town" value="Ville"/>

                <x-input id="town" class="block mt-1 w-full" type="text" name="town" :value="old('town')" required/>
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-label for="address" value="Adresse"/>

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="Mot de passe"/>

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="Confirmer le mot de passe"/>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    Déjà inscrit ?
                </a>

                <x-button class="ml-4">
                    Inscription
                </x-button>
            </div>
        </form>

        <hr class="my-6" />

        <div class="flex justify-center">
            <x-button-link href="{{ route('login') }}">
                J'ai déjà un compte
            </x-button-link>
        </div>
    </x-auth-card>
</x-guest-layout>
