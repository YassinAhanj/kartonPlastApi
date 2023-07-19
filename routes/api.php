<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//public Routes
Route::post('/login', [AdminController::class, 'login']);

Route::get('/AllArticles' , [MemberController::class , 'index']);
Route::get('/AllArticles/{id}' , [MemberController::class , 'show']);

//Private Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('/articles', ArticleController::class);
    Route::post('/logout', [AdminController::class, 'logout']);
    Route::post('/register', [AdminController::class, 'register']);
});
