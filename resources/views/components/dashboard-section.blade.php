<section class="py-12">
    <x-container>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @isset($sectionHeading)
                <h3 class="my-2 text-3xl font-semibold">{{ $sectionHeading }}</h3>
                @endisset
                {{ $slot }}
            </div>
        </div>
    </x-container>
</section>
