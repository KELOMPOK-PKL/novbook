<?php

namespace App\View\Components;

use App\Models\Chapter;
use App\Models\NovelCategory;
use App\Services\NovelService;
use Illuminate\View\Component;
use Illuminate\View\View;

class LandingLayout extends Component
{
    public NovelService $novelService;

    public function __construct()
    {
        $this->novelService = new NovelService;
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $novelCategory = NovelCategory::all();
        $novels = $this->novelService->index()->get();
        $chapters = Chapter::all();
    //   dd($chapters);

        return view('layouts.landing', compact('novelCategory', 'novels', 'chapters'));
    }
}
