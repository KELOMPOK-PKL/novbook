<?php

namespace App\View\Components;

use App\Models\NovelCategory;
use Illuminate\View\Component;
use Illuminate\View\View;

class LandingLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $novelCategory = NovelCategory::all();
        return view('layouts.landing', compact('novelCategory'));
    }
}
