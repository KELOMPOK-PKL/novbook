<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\NovelCategory;

class HomeController extends Controller
{

    public function __invoke()
    {
        $novelCategory = NovelCategory::all();

        return view('landing.homepage.index', \compact('novelCategory'));
    }
}
