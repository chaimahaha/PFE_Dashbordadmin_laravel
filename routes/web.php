<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('login', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {


    Route::get('userManager', [App\Http\Controllers\FonctionnalityController::class, 'user_manager'])->name('userManager');
    Route::get('postsManager', [App\Http\Controllers\FonctionnalityController::class, 'posts_manager'])->name('postsManager');
    Route::get('inscriptionManager', [App\Http\Controllers\FonctionnalityController::class, 'inscription_manager'])->name('inscriptionManager');
    Route::get('actualityManager', [App\Http\Controllers\FonctionnalityController::class, 'actuality_manager'])->name('actualityManager');
    Route::get('demandManager', [App\Http\Controllers\FonctionnalityController::class, 'demand_manager'])->name('demandManager');
    Route::get('eventManager', [App\Http\Controllers\FonctionnalityController::class, 'event_manager'])->name('eventManager');
    Route::get('contentsManager', [App\Http\Controllers\FonctionnalityController::class, 'contents_manager'])->name('contentManager');
    /*Route::get('side', function(){
        return view('layouts.sidebar');//il faut indiquer le nom de dossier qui compris le fichier  .blade.php
    });
    */
    Route::get('profil', function () {
        return view('NotifProfil.profil');
    });
    Route::get('formevent', function () {
        return view('Forms.eventForms');
    });
    Route::post('/post/send','PostController@store')->name('posts.store');
    Route::get('/', function () {
        return view('welcome');
    });



});
