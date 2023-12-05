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

Route::get('/', [App\Http\Controllers\CompanyController::class, 'home'])->name('home.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/adminDashBoard', [App\Http\Controllers\CompanyController::class, 'index'])->name('admin.index');
    Route::delete('/admin/{company}', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('company.destroy');
    Route::get('/admin/edit/{company}', [App\Http\Controllers\EditCompanyController::class, 'index'])->name('companyEdit.index');
    Route::get('/admin/add',[App\Http\Controllers\AddCompanyController::class, 'index'])->name('addCompany.index');
    Route::post('/admin/add',[App\Http\Controllers\AddCompanyController::class, 'store'])->name('addCompany.store');
    Route::post('/admin/edit/{company}', [App\Http\Controllers\EditCompanyController::class, 'update'])->name('companyEdit.update');


    Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employee/add', [App\Http\Controllers\AddEmployeeController::class, 'index'])->name('addEmployee.index');
    Route::post('/employee/add', [App\Http\Controllers\AddEmployeeController::class, 'store'])->name('addEmployee.store');

    Route::delete('/employee/{employee}/', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::get('/employee/edit/{employee}', [App\Http\Controllers\EditEmployeeController::class, 'index'])->name('editEmployee.index');
    Route::post('/employee/edit/{employee}', [App\Http\Controllers\EditEmployeeController::class, 'edit'])->name('editEmployee.update');

//    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
//        ->name('logout');
});

require __DIR__.'/auth.php';








