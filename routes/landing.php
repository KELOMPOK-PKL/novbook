<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Landing\HomeController')->name('home');
Route::resource('contact', 'Landing\ContactController')->only('index');
Route::post('/contact', 'Landing\ContactController@sendEmail')->name('contact.send');
Route::get('page/{page}', 'Landing\NovelCategoryController')->name('category');
Route::resource('novels', 'Landing\NovelController')->only('index','show');
Route::resource('chapters', 'Landing\ChapterController')->only('index','show');
require __DIR__ . '/auth.php';
