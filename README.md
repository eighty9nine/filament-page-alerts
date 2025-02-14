# Filament Page Alerts

## Display more aggressive alerts in any filament page

[![Latest Version on Packagist](https://img.shields.io/packagist/v/eightynine/filament-page-alerts.svg?style=flat-square)](https://packagist.org/packages/eightynine/filament-page-alerts)
[![Total Downloads](https://img.shields.io/packagist/dt/eightynine/filament-page-alerts.svg?style=flat-square)](https://packagist.org/packages/eightynine/filament-page-alerts)


## 🛠️ Be Part of the Journey

Hi, I'm Eighty Nine. I created page alerts plugin to solve real problems I faced as a developer. Your sponsorship will allow me to dedicate more time to enhancing these tools and helping more people. [Become a sponsor](https://github.com/sponsors/eighty9nine) and join me in making a positive impact on the developer community.

## Introduction

This package shows alerts in any page, not just the dashboard, currently the alerts appear on top of the page.

![Package screenshot](https://raw.githubusercontent.com/eighty9nine/filament-page-alerts/3.x/resources/img/page-alerts.png)

## Installation

You can install the package via composer:

```bash
composer require eightynine/filament-page-alerts
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-page-alerts-config"
```

This is the contents of the published config file:

```php
use Filament\View\PanelsRenderHook;

return [

    /**
     * Render hook
     * 
     * The render hook to use for the alerts
     */
    "render-hook" => PanelsRenderHook::PAGE_START
];
```

## Usage
Add the plugin to your panel service provider
```php

    public function panel(Panel $panel): Panel
    {
        return $panel
            //...
            //...
            ->plugin(FilamentPageAlertsPlugin::make())
            ->spa();
    }

```

You can use the `PageAlert` class to send alerts to your page!
```php
    return [
            Actions\CreateAction::make(),
            Actions\Action::make('show notification')
                ->action(function () {
                    PageAlert::make()
                        ->title('Saved successfully')
                        ->body('Yey.. Your changes have been saved: ' . now())
                        ->success()
                        ->send();
                    PageAlert::make()
                        ->title('Saved failure')
                        ->body('Ooops, Your changes have not been saved! ')
                        ->danger()
                        ->send();
                    PageAlert::make()
                        ->title('This requires your attention')
                        ->body('Hey there, this is important')
                        ->warning()
                        ->url('https://www.google.com', 'Google')
                        ->send();
                    PageAlert::make()
                        ->title('You need to check this out')
                        ->body('This looks like something worth your attention')
                        ->info()
                        ->send();
                }),
        ];
```


## Credits

- [Eighty Nine](https://github.com/eightynine)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
