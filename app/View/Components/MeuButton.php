<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MeuButton extends Component
{
    public string $type;
    public bool $disabled;

    public function __construct($type = 'primary', $disabled = false)
    {
        $this->type = $type;
        $this->disabled = $disabled;
    }

    public function getColor()
    {
        return match ($this->type) {
            'danger' => 'bg-red-600',
            'success' => 'bg-green-600',
            default => 'bg-blue-600',
        };
    }

    public function render()
    {
        return view('components.meu-button');
    }
}
