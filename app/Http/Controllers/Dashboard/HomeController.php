<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ChapterService;
use App\Services\NovelCategoryService;
use App\Services\NovelService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public NovelCategoryService $novelCategoryService; 
    public NovelService $novelService;
    public ChapterService $chapterService;
    public string $dashboardView = 'dashboard.';

    public function __construct()
    {
        $this->novelService = new NovelService; 
        $this->novelCategoryService = new NovelCategoryService; 
        $this->chapterService = new ChapterService;    
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
            $novelCount = $this->novelService->index()->count();
            $categoryCount = $this->novelCategoryService->index()->count();
            $userCount = User::count();
            $chapterCount = $this->chapterService->index()->count();
            $dashboardView = $this->dashboardView;
            return view($dashboardView.'dashboard',compact('novelCount','categoryCount','userCount','chapterCount'));
    }
}