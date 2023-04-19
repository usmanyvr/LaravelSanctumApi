<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
/* Route::get('/students', function() {
    return 'All student info';
});
 */

// Public Routes

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// Protected Routes
Route::middleware(['auth:sanctum'])->group(function() {
    Route::middleware('auth:sanctum')->get('/students', [StudentController::class, 'index']);
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::post('/students', [StudentController::class, 'store']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
    Route::get('/students/search/{city}', [StudentController::class, 'search']);    
    Route::get('/user', [StudentController::class, 'index']);
    Route::post('/logout', [UserController::class, 'logout']);
});
