<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SwiperPrev extends Component
{
    public $icon, $height;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($icon, $height = '40px')
    {
        $this->icon = $icon;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.swiper-prev');
    }
}
