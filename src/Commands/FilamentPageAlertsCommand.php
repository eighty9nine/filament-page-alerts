<?php

namespace EightyNine\FilamentPageAlerts\Commands;

use Illuminate\Console\Command;

class FilamentPageAlertsCommand extends Command
{
    public $signature = 'filament-page-alerts';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
