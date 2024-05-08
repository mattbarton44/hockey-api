<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Season;
use App\Models\Game;
use App\Http\Requests\StoreSeasonRequest;
use Illuminate\Http\Request;

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
    
    public function spawnAllGames(Request $request, Season $season)
    {
      $games = array();
      foreach ($season->rosters as $r) {
        foreach ($season->rosters as $r2) {
          if($r != $r2) {
            for($i = 1; $i <= $request->quantity; $i++) {
              $games[] = new Game([
                'home_team_id' => $r->team_id,
                'away_team_id' => $r2->team_id,
                'venueName' => $r->team->venueName,
                'venueAddress' => $r->team->venueAddress,
                'time' => null,
                'status' => $request->status,
                'scoreType' => null,
                'homeTeamScore' => null,
                'visitingTeamScore' => null,
                'homeTeamScoreSo' => null,
                'visitingTeamScoreSo' => null,
                'season_id' => null,
                'type' => $request->type,
              ]);
            }
          }
        }
      }
      $season->games()->savemany($games);
      return response()->json([
          'status' => true,
          'message' => "Spawned all games",
      ], 200);
    }
}
