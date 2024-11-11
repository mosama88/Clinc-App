<?php

    use App\Http\Controllers\Dashboard\CurrencyController;
    use App\Http\Controllers\Dashboard\HomeController;
    use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\calcNetSalaryController;

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





Route::middleware(['auth:admin', 'verified'])->prefix('admin')->name('dashboard.')->group(function (){

    Route::get('dashboard',[HomeController::class,'admin'])->name('admin');
    Route::get('currencies',[CurrencyController::class,'index'])->name('currencies.index');
    Route::get('currencies/create',[CurrencyController::class,'create'])->name('currencies.create');
    Route::post('currencies/store',[CurrencyController::class,'store'])->name('currencies.store');
    Route::get('currencies/edit/{id}',[CurrencyController::class,'edit'])->name('currencies.edit');
    Route::put('currencies/update/{id}',[CurrencyController::class,'update'])->name('currencies.update');
    Route::delete('currencies/destroy/{id}',[CurrencyController::class,'destroy'])->name('currencies.destroy');


    Route::resource('calcNetSalary',calcNetSalaryController::class);

    
});


Route::middleware('auth:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
 Route::get('/{page}', [PageController::class, 'index']);