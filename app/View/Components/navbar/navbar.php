<?php

namespace App\View\Components\navbar;

use App\Models\NovelCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // $novelCategory = NovelCategory::all();

        return view('components.navbar.navbar');
    }
}
