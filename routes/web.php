<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
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
    return view('layout');
});

/*Route::get('/layout', function (){
    return view('layout');
});*/
//creates all crud routes here
Route::resource('/brands', BrandController::class);

Route::resource('/categories',CategoryController::class);

Route::get('/reports/brand-report',function (){
    return view('reports.brands');
});

Route::get('/reports/category-report',function(){
    return view(view: 'reports.categories');
});
