<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chapters = Chapter::all();

        return view('landing.chapter.index', compact('chapters'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {

        return view('landing.chapter.show', compact('chapter'));
    }
}
