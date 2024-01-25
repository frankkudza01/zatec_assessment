<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Artists\ArtistController;
use App\Http\Controllers\Albums\AlbumController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login/user/', [App\Http\Controllers\Authentication\AuthController::class, 'login'])->name('/login/user/');
Route::get('/login/google/', [App\Http\Controllers\Authentication\AuthController::class, 'redirectToGoogle'])->name('/login/google/');
Route::get('/login/google/callback/', [App\Http\Controllers\Authentication\AuthController::class, 'handleGoogleCallback'])->name('/login/google/callback/');


Route::group(['middleware' => 'auth'], function () {
    Route::prefix('artists')->group(function () {
        Route::get('/', [ArtistController::class, 'index']);
        Route::post('/', [ArtistController::class, 'store']);
        Route::get('/{id}', [ArtistController::class, 'show']);
        Route::put('/{id}', [ArtistController::class, 'update']);
        Route::delete('/{id}', [ArtistController::class, 'destroy']);
        Route::get('/search', [ArtistController::class, 'searchArtist']);
    });
    
    Route::prefix('albums')->group(function () {
        Route::get('/albums/albums', [AlbumController::class, 'index']);
        Route::post('/search', [AlbumController::class, 'search']);
        Route::post('/show', [AlbumController::class, 'show']);
    });


    Route::post('/favorite/artists', [ArtistController::class, 'favoriteArtist']);
    Route::delete('/favorite/artists/{id}', [ArtistController::class, 'unfavoriteArtist']);
    Route::get('/favorite/artists', [ArtistController::class, 'getFavoriteArtists']);

    Route::post('/favorite/albums/', [AlbumController::class, 'favoriteAlbum']);
    Route::get('/favorite/albums/', [AlbumController::class, 'getFavoriteAlbums']);
    Route::delete('/favorite/albums/{id}', [AlbumController::class, 'unfavoriteAlbum']);


    Route::get('/get_user/data/', [App\Http\Controllers\Authentication\AuthController::class, 'getUser'])->name('/get_user/data/');
    Route::post('/logout/user/', [App\Http\Controllers\Authentication\AuthController::class, 'logout'])->name('/logout/user/');
});