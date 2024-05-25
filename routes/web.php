<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','FrontController@index')->name('index');
Route::get('/albums','FrontController@albums')->name('albums');
Route::get('/contact','FrontController@contact')->name('contact');
Route::get('/about','FrontController@about')->name('about');
Route::get('/event','FrontController@event')->name('event');
Route::get('/blank', function () {
    return view('back.blank');
});
Route::get('/album/{album}', 'FrontController@show')->name('show');
Route::get('/artist/{artist}', 'FrontController@showArtist')->name('showArtist');
Route::get('/event/{event}', 'FrontController@showEvent')->name('showEvent');
Route::post('/message', 'MessageController@store')->name('message.store');


Auth::routes(['register' => false]);
Route::middleware(['auth'])->group(function (){
    Route::prefix('admin')->group(function () {
        Route::resource('artist', 'ArtistController');
        Route::resource('song', 'SongController');
        Route::resource('album', 'AlbumController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('event', 'EventController');
        Route::resource('testimonial', 'TestimonialController');
        Route::get('/message','MessageController@index')->name('message.index');
        Route::delete('/{message}', 'MessageController@destroy')->name('message.destroy');

    });
});

