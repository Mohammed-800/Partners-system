<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainPartnersController;
use App\Http\Controllers\TblempsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::get('/', function () {
    return view('auth.login'); // مسار الصفحة الرئيسية يعرض صفحة تسجيل الدخول
});


Auth::routes(["register"=>false]); // تعريف مسارات المصادقة باستثناء التسجيل

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // مسار الصفحة الرئيسية بعد تسجيل الدخول

// مسارات إدارة الشركاء الرئيسيين
Route::resource('mainpartners', MainPartnersController::class);

// مسارات إدارة الموظفين
Route::resource('tblemps', TblempsController::class);

// مسارات إدارة لوحة التحكم الإدارية
Route::get('/{page}', [AdminController::class, 'index']);

Auth::routes();

// مسار الصفحة الرئيسية بعد تسجيل الدخول
