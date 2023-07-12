<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Services\ChapterService;
use Illuminate\Http\Request;

class ShowChapterController extends Controller
{
    public string $chapterView = 'landing.chapter.';

    public ChapterService $chapterService;

    public function __construct()
    {
        $this->chapterService = new ChapterService;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $chapterView = $this->chapterView;
        $chapters = $this->chapterService->index()->where('novel_id', $id)->get();

        return view($chapterView . 'index', compact('chapters'));
    }
}
