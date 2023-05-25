<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{

    public function __invoke()
    {

        return view('landing.homepage.index');
    }
}



