<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Http\Requests\StorePlayerRequest;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $players = Player::all();
      return response()->json([
        'status' => true,
        'data' => $players
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayerRequest $request)
    {
      $player = Player::create($request->all());
      return response()->json([
          'status' => true,
          'message' => "Player Created successfully!",
          'data' => $player
      ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
      return response()->json([
        'status' => true,
        'data' => $player
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(StorePlayerRequest $request, Player $player)
    {
      $player->update($request->all());
      return response()->json([
          'status' => true,
          'message' => "Player Updated successfully!",
          'data' => $player
      ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
      $player->delete();
      return response()->json([
          'status' => true,
          'message' => "Player Deleted successfully!",
      ], 200);
    }
}
