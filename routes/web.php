<?php

use App\Http\Controllers\TechnologyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// implementacja routingu do weryfikacji mailowej
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// routing dla technologii
Route::name('technologies.')->prefix('technologies')->group( function() {
    Route::get('', [TechnologyController::class, 'index'])->name('index');

    // odpowiedzialny za wyswietlanie formularza dodawania
    Route::get('create', [TechnologyController::class, 'create'])->name('create');

    // odpowiedzialny za dodawanie nowych wierszy do bazy
    Route::post('', [TechnologyController::class, 'store'])->name('store');

    // odpowiedzialny za wyswietlanie formularza od edycji
    Route::get('{technology}/edit', [TechnologyController::class, 'edit'])->where('item', '[0-9]+')->name('edit');

    // odpowiedzialny za przesylanie zedytowanego formularza do bazy
    Route::patch('{technology}/edit', [TechnologyController::class, 'update'])->where('item', '[0-9]+')->name('update');

    //usuwanie
    Route::delete('{technology}', [TechnologyController::class, 'destroy'])->where('item', '[0-9]+')->name('destroy');

    // przywracanie
    Route::put('{id}/restore', [TechnologyController::class, 'restore'])->where('id', '[0-9]+')->name('restore');
});



require __DIR__.'/auth.php';
