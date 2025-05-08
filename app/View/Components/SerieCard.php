<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SerieCard extends Component
{

    public $serie;
    /**
     * Create a new component instance.
     */
    public function __construct($serie)
    {
        $this->serie = $serie;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.serie-card');
    }
}
