<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\PageVisit;

class footerlanding extends Component
{
    /**
     * Create a new component instance.
     */
     public $views;

    public function __construct()
{
    $this->views = PageVisit::where('page', 'landing')->value('views') ?? 0;
}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footerlanding');
    }
}
