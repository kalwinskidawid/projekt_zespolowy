<?php

use App\Http\Controllers\EmployeeAdvertController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\SchoolTypeController;
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

// funkcjonalnosci administratora
Route::middleware('role:admin')->group(function() {
    // routing dla technologii
    Route::name('technologies.')->prefix('technologies')->group(function () {
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
    Route::name('levels.')->prefix('levels')->group(function () {
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
    Route::name('languages.')->prefix('languages')->group(function () {
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

    // Routing dla certyfikatów
    Route::name('certificates.')->prefix('certificates')->group(function () {
        Route::get('', [CertificateController::class, 'index'])->name('index');

        // odpowiedzialny za wyswietlanie formularza dodawania
        Route::get('create', [CertificateController::class, 'create'])->name('create');

        // odpowiedzialny za dodawanie nowych wierszy do bazy
        Route::post('', [CertificateController::class, 'store'])->name('store');

        // odpowiedzialny za wyswietlanie formularza od edycji
        Route::get('{certificate}/edit', [CertificateController::class, 'edit'])->where('certificate', '[0-9]+')->name('edit');

        // odpowiedzialny za przesylanie zedytowanego formularza do bazy
        Route::patch('{certificate}/edit', [CertificateController::class, 'update'])->where('certificate', '[0-9]+')->name('update');

        //usuwanie
        Route::delete('{certificate}', [CertificateController::class, 'destroy'])->where('certificate', '[0-9]+')->name('destroy');

        // przywracanie
        Route::put('{id}/restore', [CertificateController::class, 'restore'])->where('id', '[0-9]+')->name('restore');
    });

    // Routing dla typów szkół
    Route::name('school_types.')->prefix('school_types')->group(function () {
        Route::get('', [SchoolTypeController::class, 'index'])->name('index');

        // odpowiedzialny za wyswietlanie formularza dodawania
        Route::get('create', [SchoolTypeController::class, 'create'])->name('create');

        // odpowiedzialny za dodawanie nowych wierszy do bazy
        Route::post('', [SchoolTypeController::class, 'store'])->name('store');

        // odpowiedzialny za wyswietlanie formularza od edycji
        Route::get('{school_type}/edit', [SchoolTypeController::class, 'edit'])->where('school_type', '[0-9]+')->name('edit');

        // odpowiedzialny za przesylanie zedytowanego formularza do bazy
        Route::patch('{school_type}/edit', [SchoolTypeController::class, 'update'])->where('school_type', '[0-9]+')->name('update');

        //usuwanie
        Route::delete('{school_type}', [SchoolTypeController::class, 'destroy'])->where('school_type', '[0-9]+')->name('destroy');

        // przywracanie
        Route::put('{id}/restore', [SchoolTypeController::class, 'restore'])->where('id', '[0-9]+')->name('restore');
    });
});
//Routing dla profilu
Route::name('profiles.')->prefix('profiles')->group(function() {
    Route::get('{id}',[ProfileController::class, 'getProfile'])->where('id', '[0-9]+')->name('getProfile');
    Route::middleware(['auth', 'verified'])->group(function (){
        Route::get('',[ProfileController::class, 'index']);

        Route::get('/add-school', [ProfileController::class, 'addSchool'])->name('addSchool');
        Route::get('/edit-school', [ProfileController::class, 'editSchool'])->name('editSchool');
        Route::get('/edit-save-school', [ProfileController::class, 'editSaveSchool'])->name('editSaveSchool');
        Route::get('/edit-cancel-school', [ProfileController::class, 'cancelSchool'])->name('cancelSchool');
        Route::get('/delete-school', [ProfileController::class, 'deleteSchool'])->name('deleteSchool');
        Route::get('/add-career', [ProfileController::class, 'addCareer'])->name('addCareer');
        Route::get('/edit-career', [ProfileController::class, 'editCareer'])->name('editCareer');
        Route::get('/edit-save-career', [ProfileController::class, 'editSaveCareer'])->name('editSaveCareer');
        Route::get('/edit-cancel-career', [ProfileController::class, 'cancelCareer'])->name('cancelCareer');
        Route::get('/delete-career', [ProfileController::class, 'deleteCareer'])->name('deleteCareer');
        Route::get('/add-skill', [ProfileController::class, 'addSkill'])->name('addSkill');
        Route::get('/edit-skill', [ProfileController::class, 'editSkill'])->name('editSkill');
        Route::get('/edit-save-skill', [ProfileController::class, 'editSaveSkill'])->name('editSaveSkill');
        Route::get('/edit-cancel-skill', [ProfileController::class, 'cancelSkill'])->name('cancelSkill');
        Route::get('/delete-skill', [ProfileController::class, 'deleteSkill'])->name('deleteSkill');
        Route::get('/add-certificate', [ProfileController::class, 'addCertificate'])->name('addCertificate');
        Route::get('/edit-certificate', [ProfileController::class, 'editCertificate'])->name('editCertificate');
        Route::get('/edit-save-certificate', [ProfileController::class, 'editSaveCertificate'])->name('editSaveCertificate');
        Route::get('/edit-cancel-certificate', [ProfileController::class, 'cancelCertificate'])->name('cancelCertificate');
        Route::get('/delete-certificate', [ProfileController::class, 'deleteCertificate'])->name('deleteCertificate');
        Route::get('/add-language', [ProfileController::class, 'addLanguage'])->name('addLanguage');
        Route::get('/edit-language', [ProfileController::class, 'editLanguage'])->name('editLanguage');
        Route::get('/edit-save-language', [ProfileController::class, 'editSaveLanguage'])->name('editSaveLanguage');
        Route::get('/edit-cancel-language', [ProfileController::class, 'cancelLanguage'])->name('cancelLanguage');
        Route::get('/delete-language', [ProfileController::class, 'deleteLanguage'])->name('deleteLanguage');
    });
});

//routing dla listy ogloszeni pracownikow
Route::name('employeeadverts.')->prefix('employeeadverts')->group(function() {
    Route::get('',[EmployeeAdvertController::class, 'index'])->name('index');
    Route::middleware(['auth', 'verified'])->group(function (){
        Route::get('create',[EmployeeAdvertController::class, 'create'])->name('create'); //ADD MIDDLEWARE
        Route::post('store',[EmployeeAdvertController::class, 'store'])->name('store');
        // odpowiedzialny za wyswietlanie formularza od edycji
        Route::get('{employeeadvert}/edit', [EmployeeAdvertController::class, 'edit'])->where('employeeadvert', '[0-9]+')->name('edit');
        // odpowiedzialny za przesylanie zedytowanego formularza do bazy
        Route::patch('{employeeadvert}/edit', [EmployeeAdvertController::class, 'update'])->where('employeeadvert', '[0-9]+')->name('update');
        Route::delete('delete/{id}',[EmployeeAdvertController::class, 'delete'])->where('id', '[0-9]+')->name('delete');
    });

});

require __DIR__.'/auth.php';
