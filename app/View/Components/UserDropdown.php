<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class UserDropdown extends Component
{
    public $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('components.user-dropdown');
    }
}