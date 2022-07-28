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
    Route::get('eventManager', [App\Http\Controllers\EventController::class, 'show'])->name('eventManager');
    Route::get('contentsManager', [App\Http\Controllers\FonctionnalityController::class, 'contents_manager'])->name('contentManager');
    /*Route::get('side', function(){
        return view('layouts.sidebar');//il faut indiquer le nom de dossier qui compris le fichier  .blade.php
    });
    */
    Route::get('profil', function () {
        return view('NotifProfil.profil');
    });
    Route::get('addpost', function () {
        return view('Forms.addPost');
    });
    Route::get('adduser', function () {
        return view('Forms.addUser');
    });
    Route::post('/post/send','PostController@store')->name('posts.store');
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('registeradmin', function () {
        return view('Account.account');
    });

   
    /* *********************************************** 
    Route::post('/event/create','EventController@store')->name('events.store');
    Route::get('/event/create', function () {
        return view('Forms.addEvent');
    });*/
    Route::get('add_event', [App\Http\Controllers\EventController::class, 'index']);
    Route::post('store-form', [App\Http\Controllers\EventController::class, 'store']);

});
Route::post('register-form', [App\Http\Controllers\RegisterController::class, 'store']);
