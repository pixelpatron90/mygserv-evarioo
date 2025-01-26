@if($alert == 'error')
<div {{ $attributes->merge(['class' => 'p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50']) }}
    role="alert">
    {{ $slot }}
</div>
@elseif($alert == 'info')
<div {{ $attributes->merge(['class' => 'p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50']) }}
    role="alert">
    {{ $slot }}
</div>
@elseif($alert == 'warning')
<div {{ $attributes->merge(['class' => 'p-4 mb-4 text-sm text-yellow-500 rounded-lg bg-yellow-50']) }}
    role="alert">
    {{ $slot }}
</div>
@elseif($alert == 'success')
<div {{ $attributes->merge(['class' => 'p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50']) }}
    role="alert">
    {{ $slot }}
</div>
@endif