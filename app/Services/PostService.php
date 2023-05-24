<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Models\Post;
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


    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {

        $post = Post::all();
        return $post;

    }
    public function store(PostRequest $request): Post
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->gambarBaru = $request->file('image')->store('img', 'public');
            $data['image'] = $this->gambarBaru;
        }

        if($request->hasfile('pdf')) {
            $this->pdfBaru = $request->file('pdf')->store('file', 'public');
            $data['pdf'] = $this->pdfBaru;
        }
        $post = $this->post->create($data);

        return $post;
    }

    public function update(PostRequest $request,Post $post): post
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->gambarBaru = $request->file('image')->store('img', 'public');
            $data['image'] = $this->gambarBaru;
        }
        $gambarLama = $post->image;
        $post->update($data);
        Storage::disk('public')->delete($gambarLama);


        if ($request->hasFile('pdf')) {
            $this->pdfBaru = $request->file('pdf')->store('file', 'public');
            $data['pdf'] = $this->pdfBaru;
        }
        $pdfLama = $post->pdf;
        $post->update($data);
        Storage::disk('public')->delete($pdfLama);

        return $post;
    }

    public function delete(Post $post)
    {
        $gambar_lama = $post->image;
        $pdf_lama = $post->pdf;
        $post->delete();
        if(! empty($gambar_lama) && (Storage::disk('public'))->exists($gambar_lama)){
            Storage::disk('public')->delete($gambar_lama);
        }

        if(! empty($pdf_lama) && (Storage::disk('public'))->exists($pdf_lama)){
            Storage::disk('public')->delete($pdf_lama);
        }

        return $post;
    }
}
