<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Landing\HomeController')->name('home');

require __DIR__ . '/auth.php';
