<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ConfirmDelete extends Component
{
    public $message;
    public $action;
    public $modalId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message = 'Are you sure you want to delete this item?', $action = '')
    {
        $this->message = $message;
        $this->action = $action;
        $this->modalId = 'delete-modal-' . uniqid();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.confirm-delete');
    }
}