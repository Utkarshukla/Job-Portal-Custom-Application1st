<?php

namespace App\View\Components\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     */
    public $tit;
    public function __construct($title)
    {
        $this->tit = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.components.header');
    }
}
