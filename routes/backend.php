<?php

use App\Http\Controllers\Dashboard\AdminPanelController;
use App\Http\Controllers\Dashboard\CurrencyController;
use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\BloodTypesController;
use App\Http\Controllers\Dashboard\NationalityController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\SpecializationController;
use App\Http\Controllers\Dashboard\BranchController;

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
    return view('dashboard.dashboard');
})->middleware(['auth:admin', 'verified'])->name('dashboard.admin');





Route::middleware(['auth:admin', 'verified'])->prefix('admin')->name('dashboard.')->group(function () {


    //
    Route::resource('admin_panels',  AdminPanelController::class);
    Route::resource('cities', CityController::class);
    Route::resource('BloodTypes', BloodTypesController::class);
    Route::resource('specializations', SpecializationController::class);
    Route::resource('nationalities', NationalityController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('branches',  BranchController::class);
    Route::get('branches/getcities', [BranchController::class, 'getcities'])->name('branches.getcities');
});


Route::middleware('auth:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::get('/{page}', [PageController::class, 'index']);