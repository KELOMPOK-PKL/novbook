<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Dashboard\HomeController')->middleware(['auth', 'verified', 'role:admin'])->name('home');


Route::middleware('auth','role:admin')->group(function () {
    Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/profile', 'ProfileController@update')->name('profile.update');
    Route::delete('/profile', 'ProfileController@destroy')->name('profile.destroy');
    Route::resource('/post', 'Dashboard\PostController');
    Route::resource('/novel', 'Dashboard\NovelController');
    Route::resource('/chapter', 'Dashboard\ChapterController');
    Route::resource('/novel-category', 'Dashboard\NovelCategoryController');
});