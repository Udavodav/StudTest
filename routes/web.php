<?php


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers\Admin')->prefix('/admin')->name('admin.')->group(function (){
    Route::namespace('Test')->name('test.')->group(function (){

        Route::get('/index_all', IndexAllController::class)->name('index_all');
        Route::get('/index_my', IndexMyController::class)->name('index_my');
        Route::get('/create', CreateController::class)->name('create');
        Route::post('/', StoreController::class)->name('store');
        Route::get('/{test}/edit', EditController::class)->name('edit');
        Route::get('/{test}', ShowController::class)->name('show');
        Route::patch('/{test}', UpdateController::class)->name('update');
        Route::delete('/{test}', DeleteController::class)->name('delete');

    });
});

