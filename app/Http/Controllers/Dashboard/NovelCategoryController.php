<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\NovelCategory\StoreNovelCategoryRequest;
use App\Http\Requests\NovelCategory\UpdateNovelCategoryRequest;
use App\Models\NovelCategory;
use App\Services\NovelCategoryService;

class NovelCategoryController extends Controller
{
    public NovelCategoryService $novelCategoryService;

    public string $novelCategoryView = 'dashboard.novel-category.';

    public function __construct()
    {
        $this->novelCategoryService = new NovelCategoryService;
    }

    public function index()
    {
        $novelCategoryView = $this->novelCategoryView;
        $novelCategories = $this->novelCategoryService->index();

        return \view($novelCategoryView . 'index', \compact('novelCategories'));
    }

    public function create()
    {
        $novelCategoryView = $this->novelCategoryView;

        return \view($novelCategoryView . 'create');
    }

    public function store(StoreNovelCategoryRequest $request)
    {
        $novelCategoryView = $this->novelCategoryView;
        $this->novelCategoryService->store($request);

        return to_route($novelCategoryView . 'index');
    }

    public function show(NovelCategory $novelCategory)
    {
        $novelCategoryView = $this->novelCategoryView;

        return view($novelCategoryView . 'show', compact('novelCategory'));
    }

    public function edit(NovelCategory $novelCategory)
    {
        $novelCategoryView = $this->novelCategoryView;

        return view($novelCategoryView . 'edit', compact('novelCategory'));
    }

    public function update(UpdateNovelCategoryRequest $request, NovelCategory $novelCategory)
    {
        $novelCategoryView = $this->novelCategoryView;
        $novelCategory = $this->novelCategoryService->update($request, $novelCategory);

        return to_route($novelCategoryView . 'index', compact('novelCategory'));
    }

    public function destroy(NovelCategory $novelCategory)
    {
        $novelCategoryView = $this->novelCategoryView;
        $this->novelCategoryService->delete($novelCategory);

        return to_route($novelCategoryView . 'index');
    }
}
