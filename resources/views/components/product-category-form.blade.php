@props(['action', 'category' => new \App\Models\ProductCategory(), 'submit', 'method' => 'POST'])

<form class="flex flex-col gap-4 mt-6" method="post" action="{{ $action }}" enctype="multipart/form-data">
@if($method === "PUT")
    @method($method)
@endif

@csrf
<!-- Name -->
    <div>
        <x-label for="name" value="Nom"/>

        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                 :value="old('name') ?? $category->name"
                 required
                 autofocus/>
    </div>

    <div>
        <x-button class="mt-4">
            {{ $submit }}
        </x-button>
    </div>
</form>
