<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//which creates the url as http://domain.com//api//brand-report?we need to pass selected date here
Route::get('/brand-report', [ReportController::class, 'getBrandReport']);

Route::get('/category-report',[ReportController::class,'getCategoryReport']);
