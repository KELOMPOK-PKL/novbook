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

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        // \dd($chapter);
        return view('landing.chapter.show', compact('chapter'));
    }
}
