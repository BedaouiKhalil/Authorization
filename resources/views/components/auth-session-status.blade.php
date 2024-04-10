@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600' , 'style'=> 'color: #008000']) }}>
        {{ $status }}
    </div>
@endif
