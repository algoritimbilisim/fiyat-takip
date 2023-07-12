<?php

namespace App\View\Components\Bar;

use Illuminate\View\Component;

class HeaderTopBar extends Component
{
    public $a;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($a)
    {
        $this->a = $a;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bar.header-top-bar');
    }
}
