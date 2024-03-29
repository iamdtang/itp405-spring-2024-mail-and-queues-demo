<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewAlbum;
use App\Models\Album;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/mail', function () {
    Mail::raw('What is your favorite framework?', function ($message) {
        $message->to('david@itp405.com')->subject('Hello, David');
    });
});

Route::get('/new-album', function () {
    // We wouldn't normally have this route. This would happen when an artist
    // uploads a new album.
    $album = Album::find(150);
     Mail::to('david@itp405.com')->queue(new NewAlbum($album));
});
