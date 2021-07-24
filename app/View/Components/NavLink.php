<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavLink extends Component
{
    public $link, $isHideOnDesktop;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link = 'javascript:void(0);', $isHideOnDesktop = false)
    {
        $this->link = $link;
        $this->isHideOnDesktop = $isHideOnDesktop;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.nav-link');
    }
}
