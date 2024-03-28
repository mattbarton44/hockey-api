<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Http\Requests\StoreGameRequest;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $games = Game::all();
      return response()->json([
        'status' => true,
        'data' => $games
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameRequest $request)
    {
      $game = Game::create($request->all());
      return response()->json([
          'status' => true,
          'message' => "Game Created successfully!",
          'data' => $game,
      ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
      return response()->json([
        'status' => true,
        'data' => $game
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGameRequest $request, Game $game)
    {
      $game->update($request->all());
      return response()->json([
          'status' => true,
          'message' => "Game Updated successfully!",
          'data' => $game
      ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
      $game->delete();
      return response()->json([
          'status' => true,
          'message' => "Game Deleted successfully!",
      ], 200);
    }
}
