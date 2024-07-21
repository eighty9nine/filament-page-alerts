<?php

namespace EightyNine\FilamentPageAlerts;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\View\View;

class FilamentPageAlertsPlugin implements Plugin
{
    use Concerns\HasPluginConfiguration;

    public function getId(): string
    {
        return 'filament-page-alerts';
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {        
        FilamentView::registerRenderHook(
            config('page-alerts.render_hook'),
            fn (): View => view('page-alerts::components.alerts', [
                'showAlertsBorder' => $this->showAlertsBorder,
            ])
        );
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
