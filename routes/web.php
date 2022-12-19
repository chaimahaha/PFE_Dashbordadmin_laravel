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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('vitrin');

Route::get('manif', [App\Http\Controllers\VitrinController::class, 'showManif'])->name('manif');
Route::get('actualites', [App\Http\Controllers\VitrinController::class, 'showActuality'])->name('actualites');
Route::get('prodcop', [App\Http\Controllers\VitrinController::class, 'showProd'])->name('prodcop');
Route::get('pub', [App\Http\Controllers\VitrinController::class, 'showPub'])->name('pub');
Route::get('theme', [App\Http\Controllers\VitrinController::class, 'show'])->name('theme');
Route::get('membres',[App\Http\Controllers\Auth\RegisterController::class, 'showVit'])->name('membres');
Route::get('/login', function () { return view('auth.login');});
Auth::routes();
Route::post('register-form', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.form');
Route::middleware(['auth'])->group(function () {
    /**************************************************************************** */
    Route::get('article',[App\Http\Controllers\Pub\ArticleScController::class, 'index']);
    Route::post('/store-art',[App\Http\Controllers\Pub\ArticleScController::class, 'store']);
    Route::get('/delete-art',[App\Http\Controllers\Pub\ArticleScController::class,'deleteArticle']);
    Route::get('/edit-art{id}',[App\Http\Controllers\Pub\ArticleScController::class, 'editArticle']);
    Route::put('update-art{id}',[App\Http\Controllers\Pub\ArticleScController::class, 'update']);
    /********************************************************************************* */
    Route::get('brevet',[App\Http\Controllers\Pub\BrevetController::class, 'index']);
    Route::post('/store-brev',[App\Http\Controllers\Pub\BrevetController::class, 'store']);
    Route::get('/delete-brev',[App\Http\Controllers\Pub\BrevetController::class,'deleteBrevet']);
    Route::get('/edit-brev{id}',[App\Http\Controllers\Pub\BrevetController::class, 'editBrevet']);
    Route::put('update-brev{id}',[App\Http\Controllers\Pub\BrevetController::class, 'update']);
    /********************************************************************************* */
    Route::get('postsManager', [App\Http\Controllers\Pub\OuvrageScController::class, 'show'])->name('postsManager');
    Route::get('ouvrage',[App\Http\Controllers\Pub\OuvrageScController::class, 'index']);
    Route::post('/store-ouv',[App\Http\Controllers\Pub\OuvrageScController::class, 'store']);
    Route::get('/delete-ouv',[App\Http\Controllers\Pub\OuvrageScController::class,'deleteOuvrage']);
    Route::get('/edit-ouv{id}',[App\Http\Controllers\Pub\OuvrageScController::class, 'editOuvrage']);
    Route::put('update-ouv{id}',[App\Http\Controllers\Pub\OuvrageScController::class, 'update']);
    /*********************************************************************************** */
    Route::get('chapitre',[App\Http\Controllers\Pub\ChapitreOuvController::class, 'index']);
    Route::post('/store-chap',[App\Http\Controllers\Pub\ChapitreOuvController::class, 'store']);
    Route::get('/delete-chap',[App\Http\Controllers\Pub\ChapitreOuvController::class,'deleteChapitre']);
    Route::get('/edit-chap{id}',[App\Http\Controllers\Pub\ChapitreOuvController::class, 'editChapitre']);
    Route::put('update-chap{id}',[App\Http\Controllers\Pub\ChapitreOuvController::class, 'update']);
    /******************************************************************************** */
    Route::get('conference',[App\Http\Controllers\Pub\ConferenceController::class, 'index']);
    Route::post('/store-conf',[App\Http\Controllers\Pub\ConferenceController::class, 'store']);
    Route::get('/delete-conference',[App\Http\Controllers\Pub\ConferenceController::class,'deleteconference']);
    Route::get('/editconference{id}',[App\Http\Controllers\Pub\ConferenceController::class, 'editConference']);
    Route::put('/updateconference{id}',[App\Http\Controllers\Pub\ConferenceController::class, 'update']);
    /********************************************************************* */
   
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
    Route::get('productionManager', [App\Http\Controllers\Prod\TheseController::class, 'show'])->name('productionManager');
    Route::get('these',[App\Http\Controllers\Prod\TheseController::class, 'index']);
    Route::post('/store-these',[App\Http\Controllers\Prod\TheseController::class, 'store']);
    Route::get('/delete-these',[App\Http\Controllers\Prod\TheseController::class,'deleteThese']);
    Route::get('/edit-these{id}',[App\Http\Controllers\Prod\TheseController::class, 'editThese']);
    Route::put('/update-these{id}',[App\Http\Controllers\Prod\TheseController::class, 'update']);
    /******************************************************************************** */
    Route::get('pfe',[App\Http\Controllers\Prod\PfeController::class, 'index']);
    Route::post('/store-pfe',[App\Http\Controllers\Prod\PfeController::class, 'store']);
    Route::get('/delete-pfe',[App\Http\Controllers\Prod\PfeController::class,'deletePfe']);
    Route::get('/edit-pfe{id}',[App\Http\Controllers\Prod\PfeController::class, 'editPfe']);
    Route::put('update-pfe{id}',[App\Http\Controllers\Prod\PfeController::class, 'update']);
    /*********************************************************************************** */
    Route::get('master',[App\Http\Controllers\Prod\MasterController::class, 'index']);
    Route::post('/store-master',[App\Http\Controllers\Prod\MasterController::class, 'store']);
    Route::get('/delete-master',[App\Http\Controllers\Prod\MasterController::class,'deleteMaster']);
    Route::get('/edit-master{id}',[App\Http\Controllers\Prod\MasterController::class, 'editMaster']);
    Route::put('update-master{id}',[App\Http\Controllers\Prod\MasterController::class, 'update']);
    /**************************************************************************************/
    Route::get('hab',[App\Http\Controllers\Prod\HabilitationController::class, 'index']);
    Route::post('/store-hab',[App\Http\Controllers\Prod\HabilitationController::class, 'store']);
    Route::get('/delete-hab',[App\Http\Controllers\Prod\HabilitationController::class,'deleteHabilitation']);
    Route::get('/edit-hab{id}',[App\Http\Controllers\Prod\HabilitationController::class, 'editHabilitation']);
    Route::put('update-hab{id}',[App\Http\Controllers\Prod\HabilitationController::class, 'update']);
    /*************************************************************************** */
    Route::get('profil', [App\Http\Controllers\HomeController::class, 'profile']);
    /********************************************************************* */
    Route::get('/edit-user{id}',[App\Http\Controllers\Auth\RegisterController::class, 'editUser']);
    Route::put('update-user{id}',[App\Http\Controllers\Auth\RegisterController::class, 'update']);
    /************************************************************************ */
    Route::get('membreHome',function(){ return view ('MembreDashboard.Fonctionnalites.home'); });
    Route::get('envoiemessage',[App\Http\Controllers\MessagerieController::class, 'show']);
    Route::post('/store-msg',[App\Http\Controllers\MessagerieController::class, 'store']);
});
Route::group(['middleware' => ['is_admin']], function () {
    Route::get('/dash',[App\Http\Controllers\Charts::class, 'userCharts']);
    Route::get('/pie',[App\Http\Controllers\Charts::class, 'pieChart']);
    Route::get('message',[App\Http\Controllers\MessagerieController::class, 'show']);
    Route::get('deletemsg',[App\Http\Controllers\MessagerieController::class, 'deleteMsg']);
    Route::get('userManager', [App\Http\Controllers\Auth\RegisterController::class, 'show'])->name('userManager');
    Route::get('adduser',[App\Http\Controllers\Auth\RegisterController::class, 'index']);
    Route::get('/delete-user',[App\Http\Controllers\Auth\RegisterController::class,'deleteUser']);
    
    Route::put("defineadmin/{id}",[App\Http\Controllers\Auth\RegisterController::class, 'defineAdmin']);
    Route::put('retireadmin/{id}',[App\Http\Controllers\Auth\RegisterController::class, 'retireAdmin']);
   
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
    Route::put('/update-conf{id}',[App\Http\Controllers\Manif\ManifestationController::class, 'update']);
    /*************************************************************************************** */
     /*************************************************************************************** */
    Route::get('domainManager', [App\Http\Controllers\DomaineController::class, 'show'])->name('domainManager');
    Route::get('adddom', [App\Http\Controllers\DomaineController::class, 'index']);
    Route::post('/store-dom', [App\Http\Controllers\DomaineController::class, 'store']);
    Route::get('/delete-dom',[App\Http\Controllers\DomaineController::class,'deleteDomaine']);
    Route::get('/edit-dom{id}',[App\Http\Controllers\DomaineController::class, 'editDomain']);
    Route::put('update-dom{id}',[App\Http\Controllers\DomaineController::class, 'update']);
    /************************************************************************************************/
   
    Route::get('addpost', function () {return view('Forms.addPost'); });
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
    Route::get('actualityManager', [App\Http\Controllers\ActualityController::class, 'show'])->name('actualityManager');
    Route::get('addact', [App\Http\Controllers\ActualityController::class, 'index']);
    Route::post('/store-act', [App\Http\Controllers\ActualityController::class, 'store']);
    Route::get('/delete-act',[App\Http\Controllers\ActualityController::class,'deleteActuality']);
    Route::get('/edit-act{id}',[App\Http\Controllers\ActualityController::class, 'editActuality']);
    Route::put('update-act{id}',[App\Http\Controllers\ActualityController::class, 'update']);
    /*********************************************************************** */
 });
