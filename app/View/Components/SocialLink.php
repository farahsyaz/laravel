<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SocialLink extends Component
{
    /**
     * The social media URL.
     *
     * @var string
     */
    public $href;

    /**
     * The icon class name.
     *
     * @var string
     */
    public $icon;

    /**
     * Create a new component instance.
     *
     * @param  string  $href
     * @param  string  $icon
     * @return void
     */
    public function __construct($href, $icon)
    {
        $this->href = $href;
        $this->icon = $icon;
    }

    /**
     * Get the platform name from the icon class.
     *
     * @return string
     */
    public function getPlatformName()
    {
        $parts = explode('-', $this->icon);
        return end($parts);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.social-link');
    }
}