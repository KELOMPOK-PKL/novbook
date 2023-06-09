<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landing.contact.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

}
