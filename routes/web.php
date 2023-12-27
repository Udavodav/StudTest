<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

//импортировал классы
Auth::routes();


Route::namespace('App\Http\Controllers\Admin')->prefix('/admin')->name('admin.')->middleware(['auth','admin'])->group(function (){
    Route::namespace('Test')->prefix('/test')->name('test.')->group(function (){

        Route::get('/index_all', IndexAllController::class)->name('index_all');
        Route::get('/index_my', IndexMyController::class)->name('index_my');
        Route::get('/create', CreateController::class)->name('create');
        Route::post('/', StoreController::class)->name('store');
        Route::get('/{test}/edit', EditController::class)->name('edit');
        Route::get('/{test}', ShowController::class)->name('show');
        Route::patch('/{test}', UpdateController::class)->name('update');
        Route::delete('/{test}', DeleteController::class)->name('delete');
    });

    Route::namespace('Question')->prefix('/question')->name('question.')->group(function () {

        Route::get('/{test}/create', CreateController::class)->name('create');
        Route::get('/{question}', ShowController::class)->name('show');
        Route::post('/', StoreController::class)->name('store');
        //Route::get('/{question}/edit', EditController::class)->name('edit');
        Route::patch('/{question}', UpdateController::class)->name('update');
        Route::delete('/{question}', DeleteController::class)->name('delete');
        });

    Route::namespace('Result')->prefix('/result')->name('result.')->group(function () {

        Route::get('/', IndexController::class)->name('index');
        Route::get('/{result}', ShowController::class)->name('show');
        Route::get('/detail/{test}', DetailController::class)->name('details');
    });

    Route::namespace('Access')->prefix('/access')->name('access.')->group(function () {

        Route::get('/{test}', IndexController::class)->name('index');
        Route::post('/', CreateController::class)->name('create');
    });

    Route::namespace('Invite')->prefix('/invite')->name('invite.')->group(function () {

        Route::get('/{test}', IndexController::class)->name('index');
        Route::post('/', StoreController::class)->name('store');
    });

    Route::namespace('Group')->prefix('/group')->name('group.')->group(function () {

        Route::get('/', IndexController::class)->name('index');
        Route::get('/create', CreateController::class)->name('create');
        Route::post('/', StoreController::class)->name('store');
    });

    Route::fallback(function () {
        abort(404);
    });
});

Route::namespace('App\Http\Controllers\Client')->prefix('/client')->name('client.')->middleware(['auth', 'client'])->group(function (){
    Route::namespace('Test')->prefix('/test')->name('test.')->group(function (){

        Route::get('/', IndexController::class)->name('index');
        Route::get('/{test}', ShowController::class)->name('show');
    });
    Route::namespace('Question')->prefix('/question')->name('question.')->group(function (){

        Route::get('/{test}/{invite}', IndexController::class)->name('index');
        Route::post('/', StoreController::class)->name('store');
    });
    Route::namespace('Result')->prefix('/result')->name('result.')->group(function (){

        Route::get('/', IndexController::class)->name('index');
        Route::get('/test/{test}', TestResultController::class)->name('details');
        Route::get('/{result}/{isBack?}', ShowController::class)->name('show');
    });

    Route::fallback(function () {
        abort(404);
    });
});



