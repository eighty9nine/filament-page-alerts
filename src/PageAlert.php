<?php

namespace EightyNine\FilamentPageAlerts;

class PageAlert {
    
    public ?string $type = "info";

    public ?string $title = null;

    public ?string $body = null;

    public ?string $icon = null;

    public ?string $url = null;

    public ?string $label = null;

    public const COLORS = ["info", "success", "warning", "danger"];

    public static function make(): self
    {
        return new self();
    }

    public function color(string $type): self
    {
        if(!in_array($type, self::COLORS)){
            throw new \Exception("Invalid alert color type");
        }
        $this->type = $type;
        return $this;
    }

    public function info(): self
    {
        $this->type = "info";
        return $this;
    }

    public function success(): self
    {
        $this->type = "success";
        return $this;
    }

    public function warning(): self
    {
        $this->type = "warning";
        return $this;
    }

    public function danger(): self
    {
        $this->type = "danger";
        return $this;
    }

    public function title(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function body(string $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function icon(string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    public function send(): void
    {
        $alert =  [
            'type' => $this->type,
            'title' => $this->title,
            'body' => $this->body,
            'icon' => $this->icon,
            'url' => $this->url,
            'label' => $this->label
        ];
        $alerts = session()->get('alerts') ?? [];
        $alerts[] = $alert;
        session()->flash('alerts', $alerts);
    }

    public function url(string $url, string $label): self
    {
        $this->url = $url;
        $this->label = $label;
        return $this;
    }
}
