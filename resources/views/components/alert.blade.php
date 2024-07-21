@props(['alert'])
@php
    if ($alert) {
        $type = $alert['type'];
        $title = $alert['title'];
        $body = $alert['body'];
        $url = $alert['url'];
        $label = $alert['label'];
        $icon = $alert['icon'] ?? match ($type) {
            "info" => "heroicon-o-information-circle",
            "success" => "heroicon-o-check-circle",
            "warning" => "heroicon-o-exclamation-triangle",
            "danger" => "heroicon-o-exclamation-circle",
            default => "heroicon-o-information-circle",
        };

        $colorClasses = match ($type) {
            "info" => "text-info-500 border-info-500",
            "success" => "text-success-500 border-success-500",
            "warning" => "text-warning-500 border-warning-500",
            "danger" => "text-danger-500 border-danger-500",
            default => "text-info-500 border-info-500",
        };

        $backgroundHover = match ($type) {
            "info" => "hover:bg-info-500",
            "success" => "hover:bg-success-500",
            "warning" => "hover:bg-warning-500",
            "danger" => "hover:bg-danger-500",
            default => "hover:bg-info-500",
        };
        session()->forget('alert');
    }
@endphp

@isset ($alert)
<div x-data="{showAlert: true}" x-show="showAlert" >
    <div x-show="showAlert" class="{{$colorClasses}} border-l-4  p-4 flex shadow-lg bg-white" role="alert">
        @if ($icon)
            <x-filament::icon :icon="$icon" class="max-h-14" color="{{$type}}">
            </x-filament::icon>
        @endif
        <div class="flex flex-col flex-grow">
            @if ($title)
                <p class="font-bold">{!! $title !!}</p>
            @endif
            @if ($body)
                <p class="font-normal">{!! $body !!}</p>            
            @endif
            @if ($url)
                <a href="{{$url}}" class="font-normal {{$colorClasses}}  underline" wire:navigate>{{$label}}</a>
            @endif
        </div>
    </div>
</div>
    {{-- <button x-data="{}" x-on:click="$dispatch('open-modal', { id: 'database-notifications' })" type="button">
        Notifications
    </button> --}}
@endisset
