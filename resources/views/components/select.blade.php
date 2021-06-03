@props(['options' => [], 'disabled' => false])

<select{{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    @forelse($options as $option)
        <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
    @empty
        {{ $slot }}
    @endforelse
</select>
