<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RosterPlayer;
use App\Http\Requests\StoreRosterPlayerRequest;

class RosterPlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rosterPlayers = RosterPlayer::all();
      return response()->json([
        'status' => true,
        'data' => $rosterPlayers
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRosterPlayerRequest $request)
    {
      $rosterPlayer = RosterPlayer::create($request->all());
      return response()->json([
          'status' => true,
          'message' => "Roster Player Created successfully!",
          'data' => $rosterPlayer
      ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RosterPlayer  $rosterPlayer
     * @return \Illuminate\Http\Response
     */
    public function show(RosterPlayer $rosterPlayer)
    {
      return response()->json([
        'status' => true,
        'data' => $rosterPlayer
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RosterPlayer  $rosterPlayer
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRosterPlayerRequest $request, RosterPlayer $rosterPlayer)
    {
      $rosterPlayer->update($request->all());
      return response()->json([
          'status' => true,
          'message' => "Roster Player Updated successfully!",
          'data' => $rosterPlayer
      ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RosterPlayer  $rosterPlayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(RosterPlayer $rosterPlayer)
    {
      $rosterPlayer->delete();
      return response()->json([
          'status' => true,
          'message' => "Roster Player Deleted successfully!",
      ], 200);
    }
}
