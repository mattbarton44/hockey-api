<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Season;
use App\Http\Requests\StoreSeasonRequest;

class SeasonController extends Controller
{
    public function index()
    {
      $seasons = Season::with('competition')->get();
      return response()->json([
        'status' => true,
        'data' => $seasons
      ]);
    }

    public function store(StoreSeasonRequest $request)
    {
      $season = Season::create($request->all());
      return response()->json([
          'status' => true,
          'message' => "Season Created successfully!",
          'data' => $season
      ], 200);
    }

    public function show(Season $season)
    {
      return response()->json([
        'status' => true,
        'data' => $season->load(['rosters.team.club', 'games.home_team', 'games.away_team', 'competition'])
      ]);
    }

    public function update(StoreSeasonRequest $request, Season $season)
    {
      $season->update($request->all());
      return response()->json([
          'status' => true,
          'message' => "Season Updated successfully!",
          'data' => $season
      ], 200);
    }

    public function destroy(Season $season)
    {
      $season->delete();
      return response()->json([
          'status' => true,
          'message' => "Season Deleted successfully!",
      ], 200);
    }
}
