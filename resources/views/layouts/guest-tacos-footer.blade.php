<!-- This example requires Tailwind CSS v2.0+ -->
<footer class="bg-white">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
        <div class="mt-8 md:mt-0 md:order-1">
            <p class="text-center text-base text-gray-400">
                &copy; {{ (new DateTime())->format('Y') }} Tacos Only
            </p>
        </div>
    </div>
</footer>
