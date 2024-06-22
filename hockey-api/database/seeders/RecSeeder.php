<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RecSeeder extends Seeder
{
    public function run()
    {
      $competitionId1 = DB::table('competitions')->insertGetId([
        'name' => 'Northern Rec Hockey Cup',
        'nickname' => 'NRHC',
        'description' => 'Recreational league style cup competition',
        'logoUrl' => 'public/images/logos/Norther-rec-logo.png',
      ]);

      $seasonId1 = DB::table('seasons')->insertGetId([
        'name' => '23/24',
        'startDate' => '2023-09-01',
        'endDate' => '2024-08-31',
        'competition_id' => $competitionId1,
      ]);

      $seasonId2 = DB::table('seasons')->insertGetId([
        'name' => '22/23',
        'startDate' => '2022-09-01',
        'endDate' => '2023-08-31',
        'competition_id' => $competitionId1,
      ]);
      
      $nrhcClubs = [
        array(
          'name' => 'Sheffield Ice Tigers',
          'nickname' => 'Ice Tigers',
          'venueName' => 'Ice Sheffield',
          'venueAddress' => 'Coleridge Road, S22BZ',
          'primaryColour' => '#18b6db',
          'secondaryColour' => '#262221',
          'logoUrl' => 'public/images/logos/sheffield_ice_tigers.png',
          'players' => array(),
        ),
        array(
          'name' => 'Samurai',
          'nickname' => 'Samurai',
          'venueName' => 'Ice Sheffield',
          'venueAddress' => 'Coleridge Road, S22BZ',
          'primaryColour' => '#c81930',
          'secondaryColour' => '#000000',
          'logoUrl' => 'public/images/logos/samuria.jpg',
          'players' => array(),
        ),
        array(
          'name' => 'Don Valley Vikings',
          'nickname' => 'Vikings',
          'venueName' => 'Ice Sheffield',
          'venueAddress' => 'Coleridge Road, S22BZ',
          'primaryColour' => '#ff6600',
          'secondaryColour' => '#000000',
          'logoUrl' => 'public/images/logos/don_valley_vikings.png',
          'players' => array(),
        ),
        array(
          'name' => 'Kingston Cobras',
          'nickname' => 'Cobras',
          'venueName' => 'Hull Ice Arena',
          'venueAddress' => 'Kingston St, Hull HU1 2DZ',
          'primaryColour' => '#862325',
          'secondaryColour' => '#e5dfc7',
          'logoUrl' => 'public/images/logos/kingston_cobras.png',
          'players' => array(),
        ),
        array(
          'name' => 'Cleveland Comets',
          'nickname' => 'Comets',
          'venueName' => 'Billingham Forum',
          'venueAddress' => 'The Causeway, Stockton-on-Tees, Billingham TS23 2LJ',
          'primaryColour' => '#c7001e',
          'secondaryColour' => '#ffffff',
          'logoUrl' => 'public/images/logos/cleveland_comets.jpg',
          'players' => array(),
        ),
        array(
          'name' => 'Whitley Bay Islanders',
          'nickname' => 'Islanders',
          'venueName' => 'Whitley Bay Ice Rink',
          'venueAddress' => 'Hillheads Rd, Whitley Bay NE25 8HP',
          'secondaryColour' => '#000000',
          'primaryColour' => '#fae017',
          'logoUrl' => 'public/images/logos/whitley_bay_islanders.png',
          'players' => array(),
        ),
      ];

      $rosterLookup = array();
      foreach($nrhcClubs as $nclub) {
        $clubId = DB::table('clubs')->insertGetId([
          'name' => $nclub["name"],
          'nickname' => $nclub["nickname"],
          'venueName' => $nclub["venueName"],
          'venueAddress' => $nclub["venueAddress"],
          'primaryColour' => $nclub["primaryColour"],
          'secondaryColour' => $nclub["secondaryColour"],
          'logoUrl' => $nclub["logoUrl"],
        ]);
        $teamId = DB::table('teams')->insertGetId([
          'name' => $nclub["name"],
          'nickname' => $nclub["nickname"],
          'venueName' => $nclub["venueName"],
          'venueAddress' => $nclub["venueAddress"],
          'primaryColour' => $nclub["primaryColour"],
          'secondaryColour' => $nclub["secondaryColour"],
          'logoUrl' => $nclub["logoUrl"],
          'club_id' => $clubId
        ]);
        $rosterId1 = DB::table('rosters')->insertGetId(['season_id' => $seasonId1, 'team_id' => $teamId]);        
        $rosterId2 = DB::table('rosters')->insertGetId(['season_id' => $seasonId2, 'team_id' => $teamId]);
        $rosterLookup[$nclub["name"]] = array("id" => $rosterId2, "venueName" => $nclub["venueName"], "venueAddress" => $nclub["venueAddress"]);
      }



      
      // 'status' => '', // [ UPCOMING, COMPLETED, POSTPONED, TBC ] 
      // 'scoreType' => '', // [ FT, OT, SO, FF]
      // $table->string('type')->nullable(); - always league
      $nrhcGames = [
        /*
        array('Sheffield Ice Tigers', 'Cleveland Comets', '2023-01-06 22:10:00', 'COMPLETED', 'FT', 6, 2, null, null, $seasonId2, 'league'),
        array('Samurai', 'Don Valley Vikings', '2023-02-03 22:20:00', 'COMPLETED', 'SO', 3, 3, 2, 1, $seasonId2, 'league'),
        array('Kingston Cobras', 'Whitley Bay Islanders', '2023-03-16 22:10:00', 'COMPLETED', 'FT', 1, 2, null, null, $seasonId2, 'league'),
        array('Don Valley Vikings', 'Sheffield Ice Tigers', '2023-11-18 22:20:00', 'COMPLETED', 'FT', 2, 4, null, null, $seasonId1, 'challenge'),
        array('Sheffield Ice Tigers', 'Cleveland Comets', '2024-01-06 22:10:00', 'COMPLETED', 'FT', 3, 4, null, null, $seasonId1, 'league'),
        array('Samurai', 'Sheffield Ice Tigers', '2024-02-03 22:20:00', 'UPCOMING', null, null, null, null, null, $seasonId1, 'league'),
        array('Don Valley Vikings', 'Sheffield Ice Tigers', '2024-03-30 22:20:00', 'UPCOMING', null, null, null, null, null, $seasonId1, 'league'),
        array('Sheffield Ice Tigers', 'Kingston Cobras', '2024-05-18 16:40:00', 'UPCOMING', null, null, null, null, null, $seasonId1, 'league'),
        array('Sheffield Ice Tigers', 'Samurai', '2024-05-04 16:40:00', 'UPCOMING', null, null, null, null, null, $seasonId1, 'league'),
        array('Sheffield Ice Tigers', 'Whitley Bay Islanders', '2024-03-16 22:10:00', 'UPCOMING', null, null, null, null, null, $seasonId1, 'league'),
        array('Kingston Cobras', 'Sheffield Ice Tigers', '2024-06-15 17:00:00', 'UPCOMING', null, null, null, null, null, $seasonId1, 'league'),
        */
      ];

      foreach($nrhcGames as $game) {
        DB::table('games')->insert([
          'home_team_id' => $rosterLookup[$game[0]]["id"],
          'away_team_id' => $rosterLookup[$game[1]]["id"],
          'venueName' => $rosterLookup[$game[0]]["venueName"],
          'venueAddress' => $rosterLookup[$game[0]]["venueAddress"],
          'time' => $game[2],
          'status' => $game[3],
          'scoreType' => $game[4],
          'homeTeamScore' => $game[5],
          'visitingTeamScore' => $game[6],
          'homeTeamScoreSo' => $game[7],
          'visitingTeamScoreSo' => $game[8],
          'season_id' => $game[9],
          'type' => $game[10],
        ]);
      }

    }
}
