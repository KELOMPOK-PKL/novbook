<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Novel;
use App\Models\NovelCategory;
use App\Models\Post;

class HomeController extends Controller
{

    public function __invoke()
    {
        $novelCategory = NovelCategory::all();
        $novels = Novel::all();
        $post   = Post::all();

        return view('landing.homepage.index',compact('novelCategory','novels','post'));
    }
}
