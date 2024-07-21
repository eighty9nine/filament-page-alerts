@php
    $alerts = session()->get('alerts');
@endphp
@if (filled($alerts))
    <div class="flex flex-col gap-4 p-3 border mt-3 max-h-40 overflow-y-auto">
        @foreach ($alerts as $alert)
            @include('page-alerts::components.alert', ['alert' => $alert])
        @endforeach
    </div>
@endif
