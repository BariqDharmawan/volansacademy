<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BootstrapRadio extends Component
{
    public $id, $name, $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $name, $label) {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.bootstrap-radio');
    }
}
