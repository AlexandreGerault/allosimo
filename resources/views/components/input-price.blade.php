<div>
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
      <span class="text-gray-500 sm:text-sm">
        {{ $currency }}
      </span>
        </div>
        <x-input type="number" name="{{ $name }}" id="{{ $id }}" placeholder="0" {{ $attributes }} value="{{ $value }}" />
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
      <span class="text-gray-500 sm:text-sm mr-6" id="price-currency">
        {{ $currencyText }}
      </span>
        </div>
    </div>
</div>
