<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Novel;
use App\Services\NovelService;
use Illuminate\Http\Request;

class NovelController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $novels = Novel::all();

        return view('landing.novel.index', compact('novels'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Novel $novel)
    {
        $novel->increment('views_count');
        return view('landing.novel.index', compact('novel'));
    }
}
