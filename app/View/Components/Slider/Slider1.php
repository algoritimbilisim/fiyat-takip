<?php

namespace App\View\Components\Slider;

use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class Slider1 extends Component
{
    public $slides;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($slides)
    {
        Log::info('Bu bir bilgi log mesajıdır.');
        $this->slides = $slides; //explode(",", $slides);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slider.slider1');
    }
}
