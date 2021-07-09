<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// POSTMAN: http://127.0.0.1:8000/api/test
Route::get('/test', function(Request $request){
    return 'api test';
});

// POSTMAN: http://127.0.0.1:8000/api/v1/user
Route::middleware('auth:api')->prefix('v1')->group(function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/authors', [AuthorController::class, 'index']);
    Route::get('/authors/{author}', [AuthorController::class, 'show']);
    // ...., lepiej:
    Route::apiResource('/authors', AuthorController::class);
    // php artisan route:list


});

// POSTMAN: http://127.0.0.1:8000/api/user
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


