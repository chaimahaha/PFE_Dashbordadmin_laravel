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
Route::get('login', function () { return view('auth.login');});
Auth::routes();
Route::post('register-form', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.form');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    /**************************************************************************** */
    Route::get('userManager', [App\Http\Controllers\Auth\RegisterController::class, 'show'])->name('userManager');
    Route::get('/delete-user',[App\Http\Controllers\Auth\RegisterController::class,'deleteUser']);
    Route::get('/edit-user{id}',[App\Http\Controllers\Auth\RegisterController::class, 'editUser']);
    Route::put('update-user{id}',[App\Http\Controllers\Auth\RegisterController::class, 'update']);
   /******************************************************************************* */
    Route::get('postsManager', [App\Http\Controllers\AuteurProjetController::class, 'show'])->name('postsManager');
    Route::get('/delete-auteur',[App\Http\Controllers\AuteurProjetController::class,'deleteAuteur']);
  
    /******************************************************************************************** */
    Route::get('addform', [App\Http\Controllers\Manif\FormationController::class, 'index']);
    Route::post('store-forma', [App\Http\Controllers\Manif\FormationController::class, 'store']);
    Route::post('/delete-forma', [App\Http\Controllers\Manif\FormationController::class, 'deleteFormation']);
    Route::get('/edit-forma{id}',[App\Http\Controllers\Manif\FormationController::class, 'editFormation']);
    Route::put('update-forma{id}',[App\Http\Controllers\Manif\FormationController::class, 'update']);

    /********************************************************************************************** */
    /************************************************************************ */
    Route::get('manifestationManager', [App\Http\Controllers\Manif\ManifestationController::class, 'show'])->name('manifestationManager');
    Route::get('addconf', [App\Http\Controllers\Manif\ManifestationController::class, 'index']);
    Route::post('addconf', [App\Http\Controllers\Manif\ManifestationController::class, 'store']);
    Route::get('/delete-manif',[App\Http\Controllers\Manif\ManifestationController::class,'deleteManifestation']);
    Route::get('/edit-conf{id}',[App\Http\Controllers\Manif\ManifestationController::class, 'editManifestation']);
    Route::put('update-conf{id}',[App\Http\Controllers\Manif\ManifestationController::class, 'update']);
    /*************************************************************************************** */
     /*************************************************************************************** */
    Route::get('domainManager', [App\Http\Controllers\DomaineController::class, 'show'])->name('domainManager');
    Route::get('adddom', [App\Http\Controllers\DomaineController::class, 'index']);
    Route::post('/store-dom', [App\Http\Controllers\DomaineController::class, 'store']);
    Route::get('/delete-dom',[App\Http\Controllers\DomaineController::class,'deleteDomaine']);
    Route::get('/edit-dom{id}',[App\Http\Controllers\DomaineController::class, 'editDomain']);
    Route::put('update-dom{id}',[App\Http\Controllers\DomaineController::class, 'update']);
    /************************************************************************************************/
    Route::get('productionManager', [App\Http\Controllers\FonctionnalityController::class, 'production_manager'])->name('productionManager');
    Route::get('profil', function () {return view('NotifProfil.profil');  });
    Route::get('addpost', function () {return view('Forms.addPost'); });
    Route::get('adduser', function () {return view('Forms.addUser');});
    Route::post('/post/send','PostController@store')->name('posts.store');
    Route::get('registeradmin', function () { return view('Account.account'); });
    //Route::get('/', function () {return view('welcome');});
    /********************************************************************************* */
    Route::get('eventManager', [App\Http\Controllers\EventController::class, 'show'])->name('eventManager');
    Route::get('add_event', [App\Http\Controllers\EventController::class, 'index']);
    Route::post('/store-form', [App\Http\Controllers\EventController::class, 'store']);
    Route::get('/delete-event',[App\Http\Controllers\EventController::class,'deleteEvent']);
    Route::get('/edit-event{id}',[App\Http\Controllers\EventController::class, 'editEvent']);
    Route::put('update-event{id}',[App\Http\Controllers\EventController::class, 'update']);
    /****************************************************************************** */
    Route::get('article',[App\Http\Controllers\Pub\ArticleScController::class, 'index']);
    Route::post('/store-art',[App\Http\Controllers\Pub\ArticleScController::class, 'store']);
    /********************************************************************************* */
    Route::get('brevet',[App\Http\Controllers\Pub\BrevetController::class, 'index']);
    Route::post('/store-brev',[App\Http\Controllers\Pub\BrevetController::class, 'store']);
    /********************************************************************************* */
    Route::get('ouvrage',[App\Http\Controllers\Pub\OuvrageScController::class, 'index']);
    Route::post('/store-ouv',[App\Http\Controllers\Pub\OuvrageScController::class, 'store']);
    /*********************************************************************************** */
    Route::get('chapitre',[App\Http\Controllers\Pub\ChapitreOuvController::class, 'index']);
    Route::post('/store-chap',[App\Http\Controllers\Pub\ChapitreOuvController::class, 'store']);
    /******************************************************************************** */
    Route::get('conference',[App\Http\Controllers\Pub\ConferenceController::class, 'index']);
    Route::post('/store-conf',[App\Http\Controllers\Pub\ConferenceController::class, 'store']);
    /********************************************************************* */
    Route::get('actualityManager', [App\Http\Controllers\ActualityController::class, 'show'])->name('actualityManager');
    Route::get('addact', [App\Http\Controllers\ActualityController::class, 'index']);
    Route::post('/store-act', [App\Http\Controllers\ActualityController::class, 'store']);
    Route::get('/delete-act',[App\Http\Controllers\ActualityController::class,'deleteActuality']);
    Route::get('/edit-act{id}',[App\Http\Controllers\ActualityController::class, 'editActuality']);
    Route::put('update-act{id}',[App\Http\Controllers\ActualityController::class, 'update']);
    /*********************************************************************** */
    Route::get('membreManager', [App\Http\Controllers\MembreController::class, 'show'])->name('membreManager');
    Route::get('addmem',[App\Http\Controllers\MembreController::class, 'index']);
    Route::post('/store-mem',[App\Http\Controllers\MembreController::class, 'store']);
    Route::get('/delete-mem',[App\Http\Controllers\MembreController::class,'deleteMembre']);
    Route::get('/edit-mem{id}',[App\Http\Controllers\MembreController::class, 'editMembre']);
    Route::put('update-mem{id}',[App\Http\Controllers\MembreController::class, 'update']);
    /****************************************************************************************** */
    Route::get('addproduct', function () {return view('Forms.addProd');});
    /******************************************************************** */
    Route::get('addcoop',[App\Http\Controllers\CooperationController::class, 'index']);
    Route::post('/store-coop',[App\Http\Controllers\CooperationController::class, 'store']);
    Route::get('cooperationManager', [App\Http\Controllers\CooperationController::class, 'show'])->name('cooperationManager');
    Route::get('/delete-coop',[App\Http\Controllers\CooperationController::class,'deleteCooperation']);
    Route::get('/edit-coop{id}',[App\Http\Controllers\CooperationController::class, 'editCooperation']);
    Route::put('update-coop{id}',[App\Http\Controllers\CooperationController::class, 'update']);
    /******************************************************************************* */
    Route::get('these',[App\Http\Controllers\Prod\TheseController::class, 'index']);
    Route::post('/store-these',[App\Http\Controllers\Prod\TheseController::class, 'store']);
    /******************************************************************************** */
    Route::get('pfe',[App\Http\Controllers\Prod\PfeController::class, 'index']);
    Route::post('/store-pfe',[App\Http\Controllers\Prod\PfeController::class, 'store']);
    /*********************************************************************************** */
    Route::get('hab',[App\Http\Controllers\Prod\HabilitationController::class, 'index']);
    Route::post('/store-hab',[App\Http\Controllers\Prod\HabilitationController::class, 'store']);

    /*************************************************************************** */
    Route::get('/',function(){return view('Dashboard.dashboard1');});
});



