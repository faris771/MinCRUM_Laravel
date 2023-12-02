<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::delete('/admin', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroy');
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');

Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee.index');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');








