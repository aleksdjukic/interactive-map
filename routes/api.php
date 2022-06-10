<?php

use App\Http\Controllers\ApiControllers\TuzilastvoApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/tuzilastvo/compare-chart/', [TuzilastvoApiController::class, 'compareChart']);
Route::get('/tuzilastvo/{slug}', [TuzilastvoApiController::class, 'tuzilastvo']);
Route::get('/tuzilastva/{slug}/main-data', [TuzilastvoApiController::class, 'tuzilastvoMainData']);
Route::get('/tuzilastvo-nadleznost/{nadleznost}', [TuzilastvoApiController::class, 'nadleznost']);
Route::get('/tuzilastvo/', [TuzilastvoApiController::class, 'tuzilastvoAll']);
Route::get('/tuzilastvo/{slug}/chart', [TuzilastvoApiController::class, 'tuzilastvoAllChart']);
Route::get('/tuzilastvo/{slug}/godine', [TuzilastvoApiController::class, 'godine']);
Route::get('/tuzilastvo/{slug}/praceni-predmeti-korupcije', [TuzilastvoApiController::class,'praceniPredmetiKorupcije']);
Route::get('/tuzilastvo-group/', [TuzilastvoApiController::class, 'tuzilastvoGroup']);

