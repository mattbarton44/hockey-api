<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Roster;
use App\Http\Requests\StoreRosterRequest;

class RosterController extends Controller
{
    public function index()
    {
      $rosters = Roster::all();
      return response()->json([
        'status' => true,
        'data' => $rosters
      ]);
    }

    public function store(StoreRosterRequest $request)
    {
      $roster = Roster::create($request->all());

      if ($request->players) {
        $roster->players()->createMany($request->players);
      }

      return response()->json([
          'status' => true,
          'message' => "Roster Created successfully!",
          'data' => $roster,
      ], 200);
    }

    public function show(Roster $roster)
    {
      return response()->json([
        'status' => true,
        'data' => $roster->load(['players.player', 'season.competition'])
      ]);
    }

    public function update(StoreRosterRequest $request, Roster $roster)
    {
      $roster->update($request->all());
      return response()->json([
          'status' => true,
          'message' => "Roster Updated successfully!",
          'data' => $roster
      ], 200);
    }
    
    public function destroy(Roster $roster)
    {
      $roster->delete();
      return response()->json([
          'status' => true,
          'message' => "Roster Deleted successfully!",
      ], 200);
    }
}
