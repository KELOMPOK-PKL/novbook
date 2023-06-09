<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Landing\HomeController')->name('home');
Route::resource('contact', 'Landing\ContactController')->only('index');

require __DIR__ . '/auth.php';
