<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Team;

class RecSeeder extends Seeder
{
    public function run()
    {
      $competitionId1 = DB::table('competitions')->insertGetId([
        'name' => 'Northern Rec Hockey Cup',
        'nickname' => 'NRHC',
        'description' => 'Recreational league style cup competition',
        'logoUrl' => 'https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/Norther-rec-logo.png',
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
          'logoUrl' => '/images/logos/nrhc/sheffield_ice_tigers.png',
          'players' => array(),
        ),
        array(
          'name' => 'Samurai',
          'nickname' => 'Samurai',
          'venueName' => 'Ice Sheffield',
          'venueAddress' => 'Coleridge Road, S22BZ',
          'primaryColour' => '#c81930',
          'secondaryColour' => '#000000',
          'logoUrl' => 'https://nrhc.ukaiht.co.uk/wp-content/uploads/2022/12/Samuria-300x300.jpg',
          'players' => array(),
        ),
        array(
          'name' => 'Don Valley Vikings',
          'nickname' => 'Vikings',
          'venueName' => 'Ice Sheffield',
          'venueAddress' => 'Coleridge Road, S22BZ',
          'primaryColour' => '#ff6600',
          'secondaryColour' => '#000000',
          'logoUrl' => 'https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/vikings-128x85.png',
          'players' => array(),
        ),
        array(
          'name' => 'Kingston Cobras',
          'nickname' => 'Cobras',
          'venueName' => 'Hull Ice Arena',
          'venueAddress' => 'Kingston St, Hull HU1 2DZ',
          'primaryColour' => '#862325',
          'secondaryColour' => '#e5dfc7',
          'logoUrl' => '/images/logos/nrhc/kingston_cobras.png',
          'players' => array(),
        ),
        array(
          'name' => 'Cleveland Comets',
          'nickname' => 'Comets',
          'venueName' => 'Billingham Forum',
          'venueAddress' => 'The Causeway, Stockton-on-Tees, Billingham TS23 2LJ',
          'primaryColour' => '#c7001e',
          'secondaryColour' => '#ffffff',
          'logoUrl' => 'https://scontent-lhr8-1.xx.fbcdn.net/v/t31.18172-8/467722_301939683229076_504439514_o.jpg?_nc_cat=107&ccb=1-7&_nc_sid=7a1959&_nc_ohc=VcBCDk16mJ8AX-tQ2xL&_nc_ht=scontent-lhr8-1.xx&oh=00_AfAGZDJAYzvnF4_BxRdoUXEVgjb-dWCkBX-Cgn6zHBVN-w&oe=65BE749C',
          'players' => array(),
        ),
        array(
          'name' => 'Whitley Bay Islanders',
          'nickname' => 'Islanders',
          'venueName' => 'Whitley Bay Ice Rink',
          'venueAddress' => 'Hillheads Rd, Whitley Bay NE25 8HP',
          'secondaryColour' => '#000000',
          'primaryColour' => '#fae017',
          'logoUrl' => 'https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/image1-300x300.png',
          'players' => array(),
        ),
      ];

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
        DB::table('rosters')->insertGetId(['season_id' => $seasonId1, 'team_id' => $teamId]);        
        DB::table('rosters')->insertGetId(['season_id' => $seasonId2, 'team_id' => $teamId]);
      }



      
      // 'status' => '', // [ UPCOMING, COMPLETED, POSTPONED, TBC ] 
      // 'scoreType' => '', // [ FT, OT, SO, FF]
      // $table->string('type')->nullable(); - always league
      $nrhcGames = [
        array('Sheffield Ice Tigers', 'Cleveland Comets', '2023-01-06 22:10:00', 'COMPLETED', 'FT', 6, 2, null, null, $seasonId2, 'league'),
        array('Samurai', 'Don Valley Vikings', '2023-02-03 22:20:00', 'COMPLETED', 'SO', 3, 3, 2, 1, $seasonId2, 'league'),
        array('Kingston Cobras', 'Whitley Bay Islanders', '2023-03-16 22:10:00', 'COMPLETED', 'FT', 1, 2, null, null, $seasonId2, 'league'),
        array('Don Valley Vikings', 'Sheffield Ice Tigers', '2023-11-18 22:20:00', 'COMPLETED', 'FT', 2, 4, null, null, $seasonId1, 'challenge'),
        array('Sheffield Ice Tigers', 'Cleveland Comets', '2024-01-06 22:10:00', 'UPCOMING', null, null, null, null, null, $seasonId1, 'league'),
        array('Samurai', 'Sheffield Ice Tigers', '2024-02-03 22:20:00', 'UPCOMING', null, null, null, null, null, $seasonId1, 'league'),
        array('Don Valley Vikings', 'Sheffield Ice Tigers', '2024-03-30 22:20:00', 'UPCOMING', null, null, null, null, null, $seasonId1, 'league'),
        array('Sheffield Ice Tigers', 'Kingston Cobras', '2024-05-18 16:40:00', 'UPCOMING', null, null, null, null, null, $seasonId1, 'league'),
        array('Sheffield Ice Tigers', 'Samurai', '2024-05-04 16:40:00', 'UPCOMING', null, null, null, null, null, $seasonId1, 'league'),
        array('Sheffield Ice Tigers', 'Whitley Bay Islanders', '2024-03-16 22:10:00', 'UPCOMING', null, null, null, null, null, $seasonId1, 'league'),
      ];

      foreach($nrhcGames as $game) {
        $homeTeam = Team::firstWhere('name', $game[0]);
        $awayTeam = Team::firstWhere('name', $game[1]);
        DB::table('games')->insert([
          'home_team_id' => $homeTeam->id,
          'away_team_id' => $awayTeam->id,
          'venueName' => $homeTeam->venueName,
          'venueAddress' => $homeTeam->venueAddress,
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
