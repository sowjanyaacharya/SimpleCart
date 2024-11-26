<?php

use App\Http\Controllers\admin\DashBoardController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\BrandController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;

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

//Routing Page for Login Which is set as Default
Route::get('/', function () {
    return view('login');
});
//when the login form is submitted
Route::post('/login', [LoginController::class,'login'])->name('login');

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin/dashboard', [DashBoardController::class, 'index'])->name('admin.dashboard');
    //creates all crud routes here
    Route::resource('/admin/brands', BrandController::class);
    Route::resource('/admin/categories', CategoryController::class);
});

//Api Routing
Route::get('/admin/reports/brand-report',function (){
    return view('admin.reports.brands');
});

Route::get('/admin/reports/category-report',function(){
    return view(view: 'admin.reports.categories');
});

