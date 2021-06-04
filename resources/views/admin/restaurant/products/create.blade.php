<x-app-layout>
    <x-slot name="header">
        Ajouter une catégorie au restaurant {{ $restaurant->name }}
    </x-slot>

    <x-dashboard-section>
        <x-slot name="sectionHeading">
            Ajouter une catégorie à {{ $restaurant->name }}
        </x-slot>

        <form>
            @csrf
            <!-- Name -->
            <div>
                <x-label for="name" value="Name"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $restaurant->name"
                         required
                         autofocus/>
            </div>
        </form>
    </x-dashboard-section>
</x-app-layout>
