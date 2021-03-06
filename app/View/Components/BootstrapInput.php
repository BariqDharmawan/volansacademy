<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BootstrapInput extends Component
{
    public $label, $name, $placeholder, $value, $isTextarea;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $placeholder = null, $value = null, $isTextarea = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->isTextarea = $isTextarea;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.bootstrap-input');
    }
}
