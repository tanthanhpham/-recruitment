<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalaryController;
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

// Route::get('admin/', function () {
//     return view('admin.users.login');
// });
Route::get('admin/', [AdminController::class,'signup'])->name('admin.signup');
Route::post('admin/login', [AdminController::class,'login'])->name('admin.login');
Route::get('admin/logout', [AdminController::class,'logout'])->name('admin.logout');

//
Route::middleware(['admin'])->group(function () {
    // Admin Management
    Route::get('admin/user/create', [AdminController::class,'create'])->name('admin.create');
    Route::post('admin/user/store', [AdminController::class,'store'])->name('admin.store');
    Route::get('admin/user/show/{id}', [AdminController::class,'show'])->name('admin.show');
    Route::get('admin/user/edit/{id}', [AdminController::class,'edit'])->name('admin.edit');
    Route::post('admin/user/change_password/{id}', [AdminController::class,'change_password'])->name('admin.change_password');
    Route::get('admin/user/lock/{id}', [AdminController::class,'lock'])->name('admin.lock');
    Route::get('admin/user', [AdminController::class,'index'])->name('admin.index');
    Route::post('admin/checkEmail', [AdminController::class,'checkEmail'])->name('admin.checkEmail');
    Route::post('admin/checkPhone', [AdminController::class,'checkPhone'])->name('admin.checkPhone');

    Route::get('admin/certificate',[CertificateController::class,'index'])->name('certificate.index');
    Route::get('admin/certificate/create',[CertificateController::class,'create'])->name('certificate.create');
    Route::post('admin/certificate/store',[CertificateController::class,'store'])->name('certificate.store');
    Route::get('admin/certificate/edit/{id}',[CertificateController::class,'edit'])->name('certificate.edit');
    Route::post('admin/certificate/update/{id}',[CertificateController::class,'update'])->name('certificate.update');
    Route::get('admin/certificate/delete/{id}',[CertificateController::class,'delete'])->name('certificate.delete');

    Route::get('admin/field',[FieldController::class,'index'])->name('field.index');
    Route::get('admin/field/create',[FieldController::class,'create'])->name('field.create');
    Route::post('admin/field/store',[FieldController::class,'store'])->name('field.store');
    Route::get('admin/field/edit/{id}',[FieldController::class,'edit'])->name('field.edit');
    Route::post('admin/field/update/{id}',[FieldController::class,'update'])->name('field.update');
    Route::get('admin/field/delete/{id}',[FieldController::class,'delete'])->name('field.delete');

    Route::get('admin/language',[LanguageController::class,'index'])->name('language.index');
    Route::post('admin/language/store',[LanguageController::class,'store'])->name('language.store');
    Route::get('admin/language/edit/{id}',[LanguageController::class,'edit'])->name('language.edit');
    Route::post('admin/language/update/{id}',[LanguageController::class,'update'])->name('language.update');
    Route::get('admin/language/delete/{id}',[LanguageController::class,'delete'])->name('language.delete');

    Route::get('admin/position',[PositionController::class,'index'])->name('position.index');
    Route::post('admin/position/store',[PositionController::class,'store'])->name('position.store');
    Route::get('admin/position/edit/{id}',[PositionController::class,'edit'])->name('position.edit');
    Route::post('admin/position/update/{id}',[PositionController::class,'update'])->name('position.update');
    Route::get('admin/position/delete/{id}',[PositionController::class,'delete'])->name('position.delete');

    Route::get('admin/salary',[SalaryController::class,'index'])->name('salary.index');
    Route::post('admin/salary/store',[SalaryController::class,'store'])->name('salary.store');
    Route::get('admin/salary/edit/{id}',[SalaryController::class,'edit'])->name('salary.edit');
    Route::post('admin/salary/update/{id}',[SalaryController::class,'update'])->name('salary.update');
    Route::get('admin/salary/delete/{id}',[SalaryController::class,'delete'])->name('salary.delete');

});

Route::get('/', function () {
    return view('candidate.homepage.index');
});


Route::get('employer/create', [EmployerController::class, 'create'])->name('employer.create');
Route::get('employer/logout', [EmployerController::class, 'logout'])->name('employer.logout');
Route::get('employer/signin', [EmployerController::class, 'signin'])->name('employer.signin');
Route::post('employer/login', [EmployerController::class, 'login'])->name('employer.login');
Route::post('employer/store', [EmployerController::class, 'store'])->name('employer.store');

Route::middleware(['employer'])->group(function () {
    Route::get('employer/', [EmployerController::class, 'index'])->name('employer.index');

    Route::get('employer/user/show/{id}', [EmployerController::class,'show'])->name('employer.show');
    Route::get('employer/user/edit/{id}', [EmployerController::class,'edit'])->name('employer.edit');
    Route::post('employer/user/update/{id}', [EmployerController::class,'update'])->name('employer.update');
    Route::get('employer/user/changePassword', [EmployerController::class,'changePassword'])->name('employer.changePassword');
    Route::post('employer/user/handleChangePassword', [EmployerController::class,'handleChangePassword'])->name('employer.handleChangePassword');

    Route::get('employer/job',[JobController::class,'index'])->name('job.index');
    Route::get('employer/job/create',[JobController::class,'create'])->name('job.create');
    Route::post('employer/job/store',[JobController::class,'store'])->name('job.store');
    Route::get('employer/job/edit/{id}',[JobController::class,'edit'])->name('job.edit');
    Route::post('employer/job/update/{id}',[JobController::class,'update'])->name('job.update');
    Route::get('employer/job/delete/{id}',[JobController::class,'delete'])->name('job.delete');
});

