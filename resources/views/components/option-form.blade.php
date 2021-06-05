@props(['action', 'option' => new \App\Models\Option(), 'submit', 'method' => 'POST'])

<form class="flex flex-col gap-4 mt-6" method="post" action="{{ $action }}" enctype="multipart/form-data">
@if($method === "PUT")
    @method($method)
@endif

@csrf
<!-- Name -->
    <div>
        <x-label for="name" value="Nom de l'option'"/>

        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                 :value="old('name') ?? $option->name"
                 required
                 autofocus/>
    </div>

    <!-- Price -->
    <div>
        <x-input-price class="block mt-1 w-full" id="price" name="price" currency="" currencyText="DH"
                       :value="old('price') ?? $option->price"
                       label="Price" aria-describedby="price"/>
    </div>

    <div>
        <x-button class="mt-4">
            {{ $submit }}
        </x-button>
    </div>
</form>
