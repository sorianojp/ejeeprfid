@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-green-600']) }}>
        {!! $status !!}
    </div>
@endif
