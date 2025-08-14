@props(['errors'])
@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'text-red-600']) }}>
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif
