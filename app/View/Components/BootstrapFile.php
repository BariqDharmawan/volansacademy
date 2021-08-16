<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BootstrapFile extends Component
{
    public $label, $name, $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $placeholder = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.bootstrap-file');
    }
}
