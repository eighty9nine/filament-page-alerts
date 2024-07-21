@php
    $alerts = session()->get('alerts');
    $containerClasses = "flex flex-col gap-4 p-3 mt-3";
    $containerClasses .= $showAlertsBorder ? " border max-h-40 overflow-y-auto" : " mb-3";
@endphp
@if (filled($alerts))
    <div 
        class="{{$containerClasses}}">
        @foreach ($alerts as $alert)
            @include('page-alerts::components.alert', ['alert' => $alert])
        @endforeach
    </div>
@endif
