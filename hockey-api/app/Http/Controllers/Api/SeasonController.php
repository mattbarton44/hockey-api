<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Season;
use App\Models\Game;
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
    
    public function spawnAllGames(Season $season)
    {
      // get season settings (how many games home and away each);
      // then for each team spawn all thier home games seems like the easiest way
      // loop over $season->rosters and for each team loop over it again and make x home games against every team that isn't itself

      $games = array();
      foreach ($season->rosters as $r) {
        // lets assume 1 home 1 away for now
        foreach ($season->rosters as $r2) {
          if($r != $r2) {
            $games[] = new Game([
              'home_team_id' => $r->team_id,
              'away_team_id' => $r2->team_id,
              'venueName' => $r->team->venueName,
              'venueAddress' => $r->team->venueAddress,
              'time' => null,
              'status' => 'TBC',
              'scoreType' => null,
              'homeTeamScore' => null,
              'visitingTeamScore' => null,
              'homeTeamScoreSo' => null,
              'visitingTeamScoreSo' => null,
              'season_id' => null,
              'type' => 'league',
            ]);
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
