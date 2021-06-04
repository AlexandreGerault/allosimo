@props(['action', 'product' => new \App\Models\Product(), 'submit', 'method' => 'POST'])

<form class="flex flex-col gap-4 mt-6" method="post" action="{{ $action }}" enctype="multipart/form-data">
@if($method === "PUT")
    @method($method)
@endif

@csrf
<!-- Name -->
    <div>
        <x-label for="name" value="Nom"/>

        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                 :value="old('name') ?? $product->name"
                 required
                 autofocus/>
    </div>

    <!-- Price -->
    <div>
        <x-input-price class="block mt-1 w-full" id="price" name="price" currency="" currencyText="MAD"
                       label="Price" aria-describedby="price"/>
    </div>

    <!-- Category -->
    <div>
        <x-label for="category" value="Catégorie"/>

        <x-select id="category" class="block mt-1 w-full" name="category">
            @foreach(\App\Models\ProductCategory::all() as $category)
                <option value="{{ $category->id }}"
                        @if(old('category') ===  $category->id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </x-select>
    </div>

    <div>
        <x-button class="mt-4">
            {{ $submit }}
        </x-button>
    </div>
</form>
