<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ForgetpasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetpasswordController;

Route::get('/', function () {
    return view('welcome');
});

Route::fallback(function () {
    return redirect('/login');
});
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.form');

Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::get('/forget-password',[ForgetpasswordController::class,'showForgetform'])->name('forget.form');
Route::post('/forget-password',[ForgetpasswordController::class,'sendResetCode'])->name('forget.send');

// expire kybd gain code bhjna 
Route::get('/resend-code', [ForgetpasswordController::class, 'resendCode'])->name('reset.code.resend');


Route::get('/reset-code', [ForgetpasswordController::class, 'showCodeForm'])->name('reset.form');
Route::post('/reset-code', [ForgetpasswordController::class, 'verifyCode'])->name('reset.code.verify');

Route::get('/photo/{id}',[PhotoController::class,'show'])->name('photo.view');
Route::delete('/photo/{id}',[PhotoController::class,'destory'])->name('photo.delete');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/reset-password/{email}', [ResetpasswordController::class, 'resetPassword'])->name('password.resetForm');

Route::post('/check-email', [ResetpasswordController::class, 'checkEmail'])->name('check.email');

Route::get('/forgetPassword',[ResetpasswordController::class,'showForgetForm'])->name('password.forgetForm');
Route::post('/update-password/{email}', [ResetpasswordController::class, 'updatePassword'])->name('update.password');

//image ko upload krna bashboard pr
 Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth')->name('dashboard');
//  img handle krna
 Route::post('/upload-image',[DashboardController::class,'upload'])->name('image.upload');

