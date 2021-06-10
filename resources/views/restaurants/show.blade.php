<x-guest-layout>
    <x-slot name="title">
        Commander chez {{ $restaurant->name }}
    </x-slot>

    <main>
        <div class="hero_in detail_page background-image relative"
             data-background="url(img/restaurant_detail_hero.jpg)">
            <div class="absolute w-full h-full">
                <img src="{{ Storage::url('restaurants/' . $restaurant->image) }}" alt=""
                     class="w-full h-full object-cover"/>
            </div>
            <div class="absolute w-full h-full bg-black opacity-50"></div>
            <div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">

                <div class="container">
                    <div class="main_info">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-6">
                                <div class="head">
                                    <div class="score"><strong>{{ $restaurant->stars }} / 10</strong></div>
                                </div>
                                <h1>{{ $restaurant->name }}</h1>
                                {{ $restaurant->town }}
                            </div>
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /main_info -->
                </div>
            </div>
        </div>
        <!--/hero_in-->

        <div class="container margin_detail">
            <div class="flex flex-col-reverse md:flex-row gap-8">
                <div class="md:w-2/3">
                    <div class="tabs_detail">
                        <div class="tab-content" role="tablist">
                            <div id="pane-A" class="card tab-pane fade show active" role="tabpanel"
                                 aria-labelledby="tab-A">
                                <div>
                                    <div class="info_content">
                                        @foreach($categories as $category => $products)
                                            <h3 class="font-semibold">{{ $category }}</h3>
                                            <div>
                                                <div class="flex flex-col gap-4">
                                                    @foreach($products as $product)
                                                        <div class="menu_item thumbs">
                                                            <figure>
                                                                <img
                                                                    src="{{ $product?->image === 'null' ? asset('img/default_product.png') : Storage::url('restaurants/'. $restaurant->name . '/products/' . $product->image) }}"
                                                                    alt="" class="lazy">
                                                            </figure>
                                                            <div class="flex justify-between">
                                                                <h4>{{ $product->name }}</h4>
                                                                <em class="flex gap-1">
                                                                    <span>{{ $product->price }} DH</span>
                                                                    <x-product-option-card :product="$product"/>
                                                                </em>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            @if ($category !== $categories->keys()->last())
                                                <hr/>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- /tab -->
                        </div>
                        <!-- /tab-content -->
                    </div>
                    <!-- /tabs_detail -->
                </div>
                <!-- /col -->

                <div class="flex-grow" id="sidebar_fixed">
                    <x-cart-preview/>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

    </main>
    <!-- /main -->
    {{--
    <div class="h-96">
        <div class="relative w-full h-full">
            <div class="absolute w-full h-full">
                <img src="{{ Storage::url('restaurants/' . $restaurant->image) }}" alt=""
                     class="w-full h-full object-cover"/>
            </div>
            <div class="absolute w-full h-full bg-black opacity-60">
            </div>
            <div class="relative w-full h-full flex items-end">
                <x-container class="w-full py-6">
                    <p class="text-4xl text-white mb-4">{{ $restaurant->name }}</p>
                    <p class="text-2xl text-white">{{ (float) $restaurant->stars / 2.0 }} / 5</p>
                </x-container>
            </div>
        </div>
    </div>

    <x-container>
        <div class="py-12">
            <div class="flex flex-col-reverse sm:flex-row gap-8">
                <div class="w-full sm:w-3/5 flex flex-col gap-8">
                    <div>
                        <p class="text-3xl px-4 sm:px-0">Restaurant Menu</p>
                    </div>

                    @foreach($categories as $category => $products)
                        <div class="px-6 py-4 bg-white shadow">
                            <p class="font-bold text-xl mb-6">{{ $category }}</p>

                            <div class="flex flex-col gap-4">
                                @foreach($products as $product)
                                    <div class="flex justify-between items-center">
                                        <img src="{{ $product?->image === 'null' ? asset('img/default_product.png') : Storage::url('restaurants/'. $restaurant->name . '/products/' . $product->image) }}" alt="" class="w-12 h-12" />
                                        <span>{{ $product->name }}</span>
                                        <div class="flex gap-4">
                                            <span>{{ $product->price }} DH</span>

                                            <x-product-option-card :product="$product"/>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex-grow">
                    <x-cart-preview/>
                </div>
            </div>
        </div>
    </x-container>
    --}}
</x-guest-layout>
