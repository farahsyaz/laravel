<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavLink extends Component
{
    public function __construct(
        public string $route,
        public string $icon,
        public ?string $class = null
    ) {}

    public function render()
    {
        return view('components.nav-link');
    }
}