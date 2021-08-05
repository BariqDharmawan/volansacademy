<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BgSection extends Component
{
    public $src, $position;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($src = 'pattern-dot.png', $position = 'bottom-left')
    {
        $this->src = $src;
        $this->position = $position;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.bg-section');
    }
}
