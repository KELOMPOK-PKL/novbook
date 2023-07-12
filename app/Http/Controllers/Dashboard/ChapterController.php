<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chapter\StoreChapterRequest;
use App\Http\Requests\Chapter\UpdateChapterRequest;
use App\Models\Chapter;
use App\Models\Novel;
use App\Services\ChapterService;

class ChapterController extends Controller
{
    public string $chapterView = 'dashboard.chapter.';

    public ChapterService $chapterService;

    public function __construct()
    {
        $this->chapterService = new ChapterService;
    }

    public function index()
    {
        $chapterView = $this->chapterView;
        $chapters = $this->chapterService->index()->get();

        return view($chapterView.'index', compact('chapters'));
    }

    public function create()
    {
        $chapterView = $this->chapterView;
        $novels = Novel::all();

        return view($chapterView.'create', compact('novels'));
    }

    public function store(StoreChapterRequest $request)
    {
        $chapterView = $this->chapterView;
        $chapter = $this->chapterService->store($request);

        return to_route($chapterView.'index', compact('chapter'));
    }

    public function show(Chapter $chapter)
    {
        $chapterView = $this->chapterView;
        $novels = Novel::all();

        return view($chapterView.'show', compact('novels', 'chapter'));
    }

    public function edit(Chapter $chapter)
    {
        $chapterView = $this->chapterView;
        $novels = Novel::all();

        return view($chapterView.'edit', compact('novels', 'chapter'));
    }

    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        $chapterView = $this->chapterView;
        $chapter = $this->chapterService->update($request, $chapter);

        return to_route($chapterView.'index', compact('chapter'));
    }

    public function destroy(Chapter $chapter)
    {
        $chapterView = $this->chapterView;
        $this->chapterService->delete($chapter);

        return to_route($chapterView.'index');
    }
}