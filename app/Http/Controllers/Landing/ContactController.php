<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landing.contact.index');
    }



    public function sendEmail(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        $data = [
            'name' => $name,
            'email' => $email,
            'message' => $message
        ];

        Mail::to('novbook.ebook@gmail.com')->send(new ContactEmail($data));
        return to_route('landing.contact.index');

    }

}
