<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarLink extends Component
{
    public $href, $bootstrapIcon, $text;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href, $bootstrapIcon, $text)
    {
        $this->href = $href;
        $this->bootstrapIcon = $bootstrapIcon;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar-link');
    }
}
