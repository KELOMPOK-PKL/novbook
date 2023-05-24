<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;

class PostController extends Controller
{
    public string $postView = 'dashboard.post.';
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
        $postView = $this->postView;

        $post = $this->postService->index();
        // dd($post);
        return view($postView . 'index', compact(['post']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postView = $this->postView;
        return view($postView . 'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, PostService $postService)
    {
        $postView = $this->postView;
        $postService->store($request);
        return redirect()->route($postView . 'index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $postView = $this->postView;
        return view($postView . 'edit', compact(['post']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, PostService $postService, Post $post)
    {
        $postView = $this->postView;
        $postService->update($request, $post);
        return redirect()->route($postView . 'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostService $postService, Post $post)
    {
        $postView = $this->postView;
        $postService->delete($post);
        return to_route($postView . 'index');
    }
}
