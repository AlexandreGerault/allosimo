<x-app-layout>
    <x-slot name="header">
        Ajouter un restaurant
    </x-slot>

    <x-dashboard-section>

        <form class="flex flex-col gap-4">
        @csrf
        <!-- Name -->
            <div>
                <x-label for="name" value="Name"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus/>
            </div>

            <!-- Description -->
            <div>
                <x-label for="description" value="Description"/>

                <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                         :value="old('description')" required/>
            </div>

            <!-- Logo -->
            <div>
                <x-label for="logo" value="Logo"/>

                <x-input id="logo" class="block mt-1 w-full" type="file" name="logo" :value="old('logo')" required/>
            </div>

            <!-- Town -->
            <div>
                <x-label for="town" value="Ville"/>

                <x-input id="town" class="block mt-1 w-full" type="text" name="town" :value="old('town')" required/>
            </div>

            <!-- State -->
            <div>
                <x-label for="state" value="État"/>

                <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required/>
            </div>

            <!-- Type -->
            <div>
                <x-label for="type" value="Type"/>

                <x-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required/>
            </div>

            <!-- Star -->
            <div>
                <x-label for="stars" value="Note"/>

                <x-input id="stars" class="block mt-1 w-full" type="number" name="stars" :value="old('stars')" min="0"
                         max="10" required/>
            </div>

            <div>
                <x-button class="mt-4">
                    Ajouter un restaurant
                </x-button>
            </div>
        </form>
    </x-dashboard-section>
</x-app-layout>
