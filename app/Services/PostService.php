<?php

namespace App\Services;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class PostService
 * @package App\Services
 */
class PostService
{
    private Post $post;
    private ?string $gambarBaru = null;
    private ?string $pdfBaru = null;
    private ?string $pdfLama = null;
    private ?string $gambarLama = null;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {
        $post = Post::all();
        return $post;
    }

    public function store(StorePostRequest $request): Post
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $this->gambarBaru = $request->file('image')->store('img', 'public');
                $data['image'] = $this->gambarBaru;
            }

            if ($request->hasfile('pdf')) {
                $this->pdfBaru = $request->file('pdf')->store('file', 'public');
                $data['pdf'] = $this->pdfBaru;
            }
            $post = $this->post->create($data);
            DB::commit();

            return $post;
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function update(UpdatePostRequest $request, Post $post): post
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $this->gambarBaru = $request->file('image')->store('img', 'public');
                $data['image'] = $this->gambarBaru;
            }

            $this->gambarLama = $post->image;
            if ($request->hasFile('pdf')) {
                $this->pdfBaru = $request->file('pdf')->store('file', 'public');
                $data['pdf'] = $this->pdfBaru;
            }

            $this->pdfLama = $post->pdf;
            $post->update($data);
            DB::commit();
            DB::afterCommit(function () {
                if (!empty($this->gambarLama) && (Storage::disk('public'))->exists($this->gambarLama)) {
                    Storage::disk('public')->delete($this->gambarLama);
                }
                if (!empty($this->pdfLama) && (Storage::disk('public'))->exists($this->pdfLama)) {
                    Storage::disk('public')->delete($this->pdfLama);
                }
            });

            return $post;
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function delete(Post $post)
    {
        DB::beginTransaction();
        try {
            $this->gambarLama = $post->image;
            $this->pdfLama = $post->pdf;
            $post->delete();
            DB::commit();
            DB::afterCommit(function () {
                if (!empty($this->gambarLama) && (Storage::disk('public'))->exists($this->gambarLama)) {
                    Storage::disk('public')->delete($this->gambarLama);
                }

                if (!empty($this->pdfLama) && (Storage::disk('public'))->exists($this->pdfLama)) {
                    Storage::disk('public')->delete($this->pdfLama);
                }
            });

            return $post;
        } catch (\Exception $e) {
        }
    }
}
