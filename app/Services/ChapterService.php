<?php

namespace App\Services;

use App\Http\Requests\Chapter\StoreChapterRequest;
use App\Http\Requests\Chapter\UpdateChapterRequest;
use App\Models\Chapter;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class ChapterService
 */
class ChapterService
{
    private Chapter $chapter;

    public ?string $newPdf = null;

    public ?string $oldPdf = null;

    public function __construct()
    {
        $this->chapter = new Chapter();
    }

    public function index()
    {
        $chapter = $this->chapter->query()->with('novel');

        return $chapter;
    }

    public function store(StoreChapterRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('pdf')) {
                $this->newPdf = $request->file('pdf')->store('chapter/file', 'public');
                $data['pdf'] = $this->newPdf;
            }
            $chapter = $this->chapter->create($data);
            DB::commit();

            return $chapter;
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('pdf')) {
                $this->oldPdf = $chapter->image;
                $this->newPdf = $request->file('pdf')->store('chapter/file', 'public');
                $data['pdf'] = $this->newPdf;
            }
            $chapter->update($data);
            DB::commit();
            DB::afterCommit(function () {
                if (! empty($this->oldPdf) && (Storage::disk('public'))->exists($this->oldPdf)) {
                    Storage::disk('public')->delete($this->oldPdf);
                }
            });

            return $chapter;
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function delete(Chapter $chapter)
    {
        DB::beginTransaction();
        try {
            $this->oldPdf = $chapter->image;
            $chapter->delete();
            DB::commit();
            DB::afterCommit(function () {
                if (! empty($this->oldPdf) && (Storage::disk('public'))->exists($this->oldPdf)) {
                    Storage::disk('public')->delete($this->oldPdf);
                }
            });

            return $chapter;
        } catch (\Exception $e) {
        }
    }
}
