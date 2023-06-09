<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Services\NovelService;


class NovelCategoryController extends Controller
{
    public NovelService $novelService;

    public function __construct()
    {
        $this->novelService = new NovelService;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke($page)
    {
        $novels = $this->novelService->index()
            ->whereHas('category', function ($query) use ($page) {
                $query->where('title', 'like', '%' . $page . '%');
            })->get();

        return \view('landing.novel-category.index', \compact('novels'));
    }
}