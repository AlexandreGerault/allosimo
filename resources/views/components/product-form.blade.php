@props(['action', 'product' => new \App\Models\Product(), 'submit', 'method' => 'POST', 'categories'])

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
        <x-input-price class="block mt-1 w-full" id="price" name="price" currency="" currencyText="DH"
                       :value="old('price') ?? $product->price"
                       label="Prix" aria-describedby="price"/>
    </div>

    <!-- Category -->
    <div>
        <x-label for="category" value="Catégorie"/>

        <x-select id="category" class="block mt-1 w-full" name="category">
            @foreach(\App\Models\ProductCategory::all() as $category)
                <option value="{{ $category->id }}"
                        @if(old('category') ===  $category->id || $product?->category?->id === $category->id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </x-select>
    </div>

    <!-- Logo -->
    <div>
        <x-label for="image" value="Image"/>
        @if($method === "POST")
            <x-input id="image" class="block mt-1 w-full rounded-none" type="file" name="image" :value="old('image')"
                     required/>
        @else
            <x-input id="image" class="block mt-1 w-full rounded-none" type="file" name="image" :value="old('image')"/>
        @endif
    </div>

    @foreach($categories as $category)
        <div class="bg-white rounded-lg shadow-md px-6 py-4">
            <p class="text-xl font-semibold">{{ $category->name }}</p>

            <div class="flex flex-col gap-2 mt-4">
                @foreach($category->options as $option)
                    <x-label>
                        <div class="flex gap-2">
                            <input type="checkbox" name="options[]" value="{{ $option->id }}" @if($product->options->pluck('id')->contains($option->id)) checked @endif />
                            <span>{{ $option->name }}</span>
                        </div>
                    </x-label>
                @endforeach
            </div>
        </div>
    @endforeach

    <div>
        <x-button class="mt-4">
            {{ $submit }}
        </x-button>
    </div>
</form>
