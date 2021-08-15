<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BootstrapModal extends Component
{
    public $id, $title, $bodyClass;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title, $bodyClass = '')
    {
        $this->id = $id;
        $this->title = $title;
        $this->bodyClass = $bodyClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.bootstrap-modal');
    }
}
