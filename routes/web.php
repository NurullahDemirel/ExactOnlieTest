<?php

use App\Http\Controllers\ExactController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[ExactController::class,'index']);
Route::get('/callback',[ExactController::class,'index']);
Route::get('/sale',[ExactController::class,'exaample']);
Route::get('/test',[TestController::class,'test']);
