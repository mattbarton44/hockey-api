<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;

class TeamController extends Controller
{

    public function index()
    {
      $teams = Team::all();
      return response()->json([
        'status' => true,
        'data' => $teams
      ]);
    }

    public function store(StoreTeamRequest $request)
    {
      $team = Team::create($request->except('logo'));
      if ($request->hasFile('logo')) {
        $path = $request->logo->store('public/images');
        $team->logoUrl = $path;
        $team->save();
      }
      return response()->json([
          'status' => true,
          'message' => "Team Created successfully!",
          'data' => $team
      ], 200);
    }

    public function show(Team $team)
    {
      return response()->json([
        'status' => true,
        'data' => $team->load(['rosters.players', 'rosters.season.competition'])
      ]);
    }

    public function update(StoreTeamRequest $request, Team $team)
    {
      $team->update($request->except('logo'));
      if ($request->hasFile('logo')) {
        // maybe delete old file if logoUrl exists already?
        $path = $request->logo->store('public/images');
        $team->logoUrl = $path;
        $team->save();
      }
      return response()->json([
          'status' => true,
          'message' => "Team Updated successfully!",
          'data' => $team
      ], 200);
    }

    public function destroy(Team $team)
    {
      $team->delete();
      return response()->json([
          'status' => true,
          'message' => "Team Deleted successfully!",
      ], 200);
    }
}
