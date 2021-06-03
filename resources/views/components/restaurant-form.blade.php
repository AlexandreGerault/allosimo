@props(['action', 'restaurant', 'submit', 'method' => 'POST'])

<form class="flex flex-col gap-4" method="post" action="{{ $action }}" enctype="multipart/form-data">
@if($method === "PUT")
    @method($method)
@endif

@csrf
<!-- Name -->
    <div>
        <x-label for="name" value="Name"/>

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $restaurant->name"
                 required
                 autofocus/>
    </div>

    <!-- Description -->
    <div>
        <x-label for="description" value="Description"/>

        <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                 :value="old('description') ?? $restaurant->description" required/>
    </div>

    <!-- Logo -->
    <div>
        <x-label for="logo" value="Logo"/>

        <x-input id="logo" class="block mt-1 w-full" type="file" name="logo" :value="old('logo')" required/>
    </div>

    <!-- Town -->
    <div>
        <x-label for="town" value="Ville"/>

        <x-input id="town" class="block mt-1 w-full" type="text" name="town" :value="old('town') ?? $restaurant->town"
                 required/>
    </div>

    <!-- State -->
    <div>
        <x-label for="state" value="État"/>

        <x-select id="state" class="block mt-1 w-full" name="state">
            <option value="open"
                    @if(old('state') === 'open' || $restaurant->state === 'open') selected @endif>
                Ouvert
            </option>
            <option value="close"
                    @if(old('type') === 'close' || $restaurant->state === 'close') selected @endif>
                Fermé
            </option>
        </x-select>
    </div>

    <!-- Type -->
    <div>
        <x-label for="type" value="Type"/>

        <x-select id="type" class="block mt-1 w-full" name="type">
            <option value="restaurant"
                    @if(old('type') === 'restaurant' || $restaurant->type === 'restaurant') selected @endif>
                Restaurant
            </option>
            <option value="bakery"
                    @if(old('type') === 'bakery' || $restaurant->type === 'bakery') selected @endif>
                Boulangerie
            </option>
        </x-select>
    </div>

    <!-- Star -->
    <div>
        <x-label for="stars" value="Note"/>

        <x-input id="stars" class="block mt-1 w-full" type="number" name="stars"
                 :value="old('stars') ?? $restaurant->stars" min="0"
                 max="10" required/>
    </div>

    <div>
        <x-button class="mt-4">
            {{ $submit }}
        </x-button>
    </div>
</form>
