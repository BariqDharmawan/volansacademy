<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListIcon extends Component
{
    public $text, $icon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $icon)
    {
        $this->text = $text;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.list-icon');
    }
}
