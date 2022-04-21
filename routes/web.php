<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LevelController;
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
    Route::get('{technology}/edit', [TechnologyController::class, 'edit'])->where('technology', '[0-9]+')->name('edit');

    // odpowiedzialny za przesylanie zedytowanego formularza do bazy
    Route::patch('{technology}/edit', [TechnologyController::class, 'update'])->where('technology', '[0-9]+')->name('update');

    //usuwanie
    Route::delete('{technology}', [TechnologyController::class, 'destroy'])->where('technology', '[0-9]+')->name('destroy');

    // przywracanie
    Route::put('{id}/restore', [TechnologyController::class, 'restore'])->where('id', '[0-9]+')->name('restore');
});

// routing dla poziomów
Route::name('levels.')->prefix('levels')->group( function() {
    Route::get('', [LevelController::class, 'index'])->name('index');

    // odpowiedzialny za wyswietlanie formularza dodawania
    Route::get('create', [LevelController::class, 'create'])->name('create');

    // odpowiedzialny za dodawanie nowych wierszy do bazy
    Route::post('', [LevelController::class, 'store'])->name('store');

    // odpowiedzialny za wyswietlanie formularza od edycji
    Route::get('{level}/edit', [LevelController::class, 'edit'])->where('level', '[0-9]+')->name('edit');

    // odpowiedzialny za przesylanie zedytowanego formularza do bazy
    Route::patch('{level}/edit', [LevelController::class, 'update'])->where('level', '[0-9]+')->name('update');

    //usuwanie
    Route::delete('{level}', [LevelController::class, 'destroy'])->where('level', '[0-9]+')->name('destroy');

    // przywracanie
    Route::put('{id}/restore', [LevelController::class, 'restore'])->where('id', '[0-9]+')->name('restore');
});

// routing dla języków
Route::name('languages.')->prefix('languages')->group( function() {
    Route::get('', [LanguageController::class, 'index'])->name('index');

    // odpowiedzialny za wyswietlanie formularza dodawania
    Route::get('create', [LanguageController::class, 'create'])->name('create');

    // odpowiedzialny za dodawanie nowych wierszy do bazy
    Route::post('', [LanguageController::class, 'store'])->name('store');

    // odpowiedzialny za wyswietlanie formularza od edycji
    Route::get('{language}/edit', [LanguageController::class, 'edit'])->where('language', '[0-9]+')->name('edit');

    // odpowiedzialny za przesylanie zedytowanego formularza do bazy
    Route::patch('{language}/edit', [LanguageController::class, 'update'])->where('language', '[0-9]+')->name('update');

    //usuwanie
    Route::delete('{language}', [LanguageController::class, 'destroy'])->where('language', '[0-9]+')->name('destroy');

    // przywracanie
    Route::put('{id}/restore', [LanguageController::class, 'restore'])->where('id', '[0-9]+')->name('restore');
});


require __DIR__.'/auth.php';
