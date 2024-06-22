<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Http\Requests\StoreGameRequest;

class GameController extends Controller
{
    public function index()
    {
      $games = Game::all();
      return response()->json([
        'status' => true,
        'data' => $games
      ]);
    }

    public function store(StoreGameRequest $request)
    {
      $game = Game::create($request->all());
      return response()->json([
          'status' => true,
          'message' => "Game Created successfully!",
          'data' => $game,
      ], 200);
    }

    public function show(Game $game)
    {
      return response()->json([
        'status' => true,
        'data' => $game,
      ]);
    }

    public function edit(Game $game)
    {
      return response()->json([
        'status' => true,
        'data' => $game->load(['season.rosters.team.club', 'season.rosters.players', 'season.competition']),
      ]);
    }

    public function update(StoreGameRequest $request, Game $game)
    {
      $game->update($request->all());
      return response()->json([
          'status' => true,
          'message' => "Game Updated successfully!",
          'data' => $game
      ], 200);
    }

    public function destroy(Game $game)
    {
      $game->delete();
      return response()->json([
          'status' => true,
          'message' => "Game Deleted successfully!",
      ], 200);
    }
}