<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Services\ChapterService;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public ChapterService $chapterService;

    public function __construct()
    {
        $this->chapterService = new ChapterService;
    }
    /**
     * Display a listing of the resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        $chapters = $this->chapterService->index()->where('novel_id', $chapter->novel_id)->get();
        // \dd($chapters);

        return view('landing.chapter.show', compact('chapter', 'chapters'));
    }
}
