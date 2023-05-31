<?php

use App\Http\Controllers\Api\GameController;
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

//ALL GAMES
Route::get('games', [GameController::class, 'index']);
//RELEVANT GAME
Route::get('relevant', [GameController::class, 'relevant']);
//TOP 3 DISCOUNT GAMES
Route::get('top3', [GameController::class, 'top3']);
