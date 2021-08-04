<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Arrow extends Component
{
    public $direction;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($direction = 'right')
    {
        $this->direction = $direction;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.arrow');
    }
}
