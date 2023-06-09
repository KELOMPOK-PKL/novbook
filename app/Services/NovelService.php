<?php

namespace App\Services;

use App\Http\Requests\Novel\StoreNovelRequest;
use App\Http\Requests\Novel\UpdateNovelRequest;
use App\Models\Novel;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class NovelService
 */
class NovelService
{
    private Novel $novel;

    public ?string $newImage;

    public ?string $oldImage;

    public function __construct()
    {
        $this->novel = new Novel();
    }

    public function index()
    {
        $novel = $this->novel->query()->with('chapters');

        return $novel;
    }

    public function store(StoreNovelRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $this->newImage = $request->file('image')->store('novel/image', 'public');
                $data['image'] = $this->newImage;
            }
            // \dd($data);
            $novel = $this->novel->create($data);

            DB::commit();

            return $novel;
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function update(UpdateNovelRequest $request, Novel $novel)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $this->oldImage = $novel->image;
                $this->newImage = $request->file('image')->store('novel/image', 'public');
                $data['image'] = $this->newImage;
            }
            $data['user_id'] = auth()->id();
            $novel->update($data);
            DB::commit();
            DB::afterCommit(function () {
                if (! empty($this->oldImage) && (Storage::disk('public'))->exists($this->oldImage)) {
                    Storage::disk('public')->delete($this->oldImage);
                }
            });

            return $novel;
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function delete(Novel $novel)
    {
        DB::beginTransaction();
        try {
            $this->oldImage = $novel->image;
            $novel->delete();
            DB::commit();
            DB::afterCommit(function () {
                if (! empty($this->oldImage) && (Storage::disk('public'))->exists($this->oldImage)) {
                    Storage::disk('public')->delete($this->oldImage);
                }
            });

            return $novel;
        } catch (\Exception $e) {
        }
    }
}
