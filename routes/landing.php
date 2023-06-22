<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Landing\HomeController')->name('home');
Route::resource('contact', 'Landing\ContactController')->only('index');
Route::get('page/{page}', 'Landing\NovelCategoryController')->name('category');
Route::resource('novels', 'Landing\NovelController')->only('index','show');
require __DIR__ . '/auth.php';
