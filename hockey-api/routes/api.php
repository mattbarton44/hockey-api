<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompetitionController;
use App\Http\Controllers\Api\SeasonController;
use App\Http\Controllers\Api\ClubController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\RosterController;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\RosterPlayerController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\GameStatisticController;
use App\Http\Controllers\Api\GameEventController;

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

Route::apiResource('competitions', CompetitionController::class);
Route::apiResource('seasons', SeasonController::class);
Route::apiResource('clubs', ClubController::class);
Route::apiResource('teams', TeamController::class);
Route::apiResource('rosters', RosterController::class);
Route::apiResource('players', PlayerController::class);
Route::apiResource('rosterPlayers', RosterPlayerController::class);
Route::apiResource('games', GameController::class);
Route::apiResource('gameStatistics', GameStatisticController::class);
Route::apiResource('gameEvents', GameEventController::class);

Route::get('/competitions/{competition}/seasons', [CompetitionController::class, 'seasons']);