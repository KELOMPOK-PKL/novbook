<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

use function Pest\Laravel\post;

class PostController extends Controller
{
    public PostService $postService;
    public function __construct()
    {
        $this->postService = new PostService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $post = $this->postService->index();
        return view('dashboard.post.index', compact(['post']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = Post::all();
        return view('Dashboard.post.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( PostRequest $request,PostService $postService )
    {
        $postService->store($request);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostService $postService, Post  $post)
    {
        $postService->delete($post);
        return to_route('dashboard.post.index');
    }
}
