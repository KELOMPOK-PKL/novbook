<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Services\NovelService;
use Illuminate\Http\Request;

class NovelController extends Controller
{
    public NovelService $novelService;

    public function __construct()
    {
       $this->novelService = new NovelService();

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $novelS = $this->novelService->index()->paginate(1);

        // return view('landing.novel-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}