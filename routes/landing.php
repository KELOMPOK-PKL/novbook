<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', 'ProfileController@userEdit')->name('profile.edit');
    Route::patch('/profile/update', 'ProfileController@userUpdate')->name('profile.update');
    Route::delete('/profile', 'ProfileController@destroy')->name('profile.destroy');
});

Route::get('/', 'Landing\HomeController')->name('home');
Route::resource('contact', 'Landing\ContactController')->only('index');
Route::post('/contact', 'Landing\ContactController@sendEmail')->name('contact.send');
Route::get('page/{page}', 'Landing\NovelCategoryController')->name('category');
Route::resource('novels', 'Landing\NovelController')->only('index', 'show')->middleware('auth');
// Route::resource('chapters', 'Landing\ChapterController')->only('index','show')->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('chapters/{id}', 'Landing\ShowChapterController')->name('chapters.index');
    Route::get('chapter/{chapter}', 'Landing\ChapterController@show')->name('chapters.show');
});
require __DIR__ . '/auth.php';
