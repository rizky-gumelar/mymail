<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormApiController;

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

Route::middleware(['auth'])->group(function () {
    // Route untuk halaman form API
    Route::get('/form-api/create', [FormApiController::class, 'create'])->name('form-api.create');
    // Route untuk menyimpan form yang dibuat oleh pengguna
    Route::post('/form-api/store', [FormApiController::class, 'store'])->name('form-api.store');
    // Route untuk menerima data formulir dari pengguna
    Route::get('/form-api/list', [FormApiController::class, 'index'])->name('form-api.list');
    Route::get('/form-api/{formApi}/edit', [FormApiController::class, 'edit'])->name('form-api.edit');
    Route::delete('/form-api/{formApi}', [FormApiController::class, 'destroy'])->name('form-api.delete');
    Route::resource('form-api', FormApiController::class)->except(['edit']);
});

Route::get('/form-success', function () {
    return view('form-api.success');
})->name('form-api.success');

Route::post('/form/{api_key}', [FormApiController::class, 'submitForm'])->name('form.submit');

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/dashboard');
    }
    return redirect('/login');
});

Route::get('/dashboard', [FormApiController::class, 'index'], function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/form-api/create', [FormApiController::class, 'create'])->name('form-api.create');
//     Route::post('/form-api/store', [FormApiController::class, 'store'])->name('form-api.store');
//     Route::post('/form-api/submit/{api_key}', [FormApiController::class, 'submitForm']);
// });


require __DIR__ . '/auth.php';
