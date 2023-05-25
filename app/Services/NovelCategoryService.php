<?php

namespace App\Services;

use App\Http\Requests\NovelCategory\StoreNovelCategoryRequest;
use App\Http\Requests\NovelCategory\UpdateNovelCategoryRequest;
use App\Models\NovelCategory;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class NovelCategoryService
 */
class NovelCategoryService
{
    private NovelCategory $novelCategory;

    public function __construct()
    {
        $this->novelCategory = new NovelCategory();
    }

    public function index()
    {
        $novelCategory = $this->novelCategory->query()->get();

        return $novelCategory;
    }

    public function store(StoreNovelCategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            $novelCategory = $this->novelCategory->create($data);
            DB::commit();

            return $novelCategory;
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function update(UpdateNovelCategoryRequest $request, NovelCategory $novelCategory)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            $novelCategory->update($data);
            DB::commit();

            return $novelCategory;
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function delete(NovelCategory $novelCategory)
    {
        DB::beginTransaction();
        try {
            $novelCategory->delete();
            DB::commit();

            return $novelCategory;
        } catch (\Exception $e) {
        }
    }
}
