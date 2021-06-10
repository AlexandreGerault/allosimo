<x-guest-layout theme="tacos-charbon">
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
            <div class="row">
                <div class="col-lg-8">
                    <div class="tabs_detail">
                        <div class="tab-content" role="tablist">
                            <div id="pane-A" class="card tab-pane fade show active" role="tabpanel"
                                 aria-labelledby="tab-A">
                                <div>
                                    <div class="card-body info_content">
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

                <div class="col-lg-4" id="sidebar_fixed">
                    <x-cart-preview/>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!-- /main -->
</x-guest-layout>
