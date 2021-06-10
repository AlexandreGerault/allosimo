@if(request()->routeIs('tacos-pizza-only*'))
    <img src="{{ asset('img/tacos-logo.png') }}"
         alt="" {{ $attributes->merge(['class' => 'w-auto h-10'])}} {{ $attributes }} />
@elseif(request()->routeIs('tacos-charbon*'))
    <img src="{{ asset('img/tacos-logo.png') }}"
         alt="" {{ $attributes->merge(['class' => 'w-auto h-10'])}} {{ $attributes }} />
@else
    <img src="{{ asset('img/logo.png') }}"
         alt="" {{ $attributes->merge(['class' => 'w-auto h-10'])}} {{ $attributes }} />
@endif
