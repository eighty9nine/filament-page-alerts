<?php

namespace EightyNine\FilamentPageAlerts\Concerns;

trait HasPluginConfiguration
{
    protected bool $showAlertsBorder = false;

    public function showAlertsBorder(bool $showAlertsBorder): static
    {
        $this->showAlertsBorder = $showAlertsBorder;

        return $this;
    }
}
