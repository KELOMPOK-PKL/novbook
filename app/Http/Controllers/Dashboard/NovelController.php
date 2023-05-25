<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Novel\StoreNovelRequest;
use App\Http\Requests\Novel\UpdateNovelRequest;
use App\Models\Novel;
use App\Models\NovelCategory;
use App\Services\NovelService;

class NovelController extends Controller
{
    public string $novelView = 'dashboard.novel.';

    public NovelService $novelService;

    public function __construct()
    {
        $this->novelService = new NovelService;
    }

    public function index()
    {
        $novels = $this->novelService->index();
        $novelView = $this->novelView;

        return view($novelView . 'index', compact('novels'));
    }

    public function create()
    {
        $novelView = $this->novelView;
        $novelCategory = NovelCategory::all();

        return view($novelView . 'create', \compact('novelCategory'));
    }

    public function show(Novel $novel)
    {
        $novelView = $this->novelView;
        $novelCategory = NovelCategory::all();

        return view($novelView . 'show', compact('novel', 'novelCategory'));
    }

    public function store(StoreNovelRequest $request)
    {
        $novelView = $this->novelView;
        $novel = $this->novelService->store($request);

        return to_route($novelView . 'index', compact('novel'));
    }

    public function update(UpdateNovelRequest $request, Novel $novel)
    {
        $novelView = $this->novelView;
        $novel = $this->novelService->update($request, $novel);
        $novelCateogries = NovelCategory::all();

        return to_route($novelView . 'index', compact('novel', 'novelCategories'));
    }

    public function edit(Novel $novel)
    {
        $novelView = $this->novelView;

        return view($novelView . 'edit', compact('novel'));
    }

    public function destroy(Novel $novel)
    {
        $novelView = $this->novelView;
        $this->novelService->delete($novel);

        return to_route($novelView . 'index');
    }
}
