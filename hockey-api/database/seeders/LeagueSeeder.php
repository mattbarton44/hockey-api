<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LeagueSeeder extends Seeder
{
    public function run()
    {
      $ncomp = DB::table('competitions')->insertGetId([
        'name' => 'NIHL Division 1 North (Moralee)',
        'nickname' => 'NIHL1 North',
        'description' => 'The NIHL Division 1 North sits at the second tier of the National Ice Hockey League structure, alongside the NIHL Division 1 South.',
        'logoUrl' => 'public/images/logos/moralee.png',
      ]);
      $nseason1 = DB::table('seasons')->insertGetId([
        'name' => '22/23',
        'startDate' => '2022-09-01',
        'endDate' => '2023-08-31',
        'competition_id' => $ncomp,
      ]);      
      $nseason2 = DB::table('seasons')->insertGetId([
        'name' => '23/24',
        'startDate' => '2023-09-01',
        'endDate' => '2024-08-31',
        'competition_id' => $ncomp,
      ]);

      $nclubs = [
        array(
          'name' => 'Sheffield Scimitars',
          'nickname' => 'Scimitars',
          'venueName' => 'Ice Sheffield',
          'venueAddress' => '23 Coleridge Rd, Sheffield S9 5DA',
          'primaryColour' => '#000000',
          'secondaryColour' => '#000000',
          'logoUrl' => 'public/images/logos/scimitars-logo.png',
          'players' => array(
            "Michael Danecko",
            "Fritz Heinzle",
            "Sam Rodgers",
            "Ryan Fraley",
            "Tyler Nixon",
            "Cameron Pywell",
            "Sam Keeling",
            "Myles Keogh",
            "Will Szollosy",
            "Sam Parkin",
            "Jacob Brammer",
            "Gabriel Fisher",
            "Reece Wickens",
            "Brad Fothergill",
            "Luke Reid",
            "Euan Williams",
            "Josh Rawsthorne",
            "Brandon Stones",
            "Hayden Oates",
            "Luke Allen",
            "Nick Winters",
            "Ben Crowther",
            "Charlie Davenport",
            "Nathaniel Bell",
            "Markus Jansons",
            "James White",
            "Scarlett Richardson",
            "Regan Kidd",
            "Aidan Dancer"
          ),
        ),
        array(
          'name' => 'Widnes Wild',
          'nickname' => 'Wild',
          'venueName' => 'Planet Ice Widnes',
          'venueAddress' => 'Earle Rd, Widnes WA8 0TA',
          'primaryColour' => '#000000',
          'secondaryColour' => '#000000',
          'logoUrl' => 'public/images/logos/Wild-Logo.png',
          'players' => array(),
        ),
        array(
          'name' => 'Nottingham Lions',
          'nickname' => 'Lions',
          'venueName' => 'National Ice Centre',
          'venueAddress' => 'Bolero Square, Belward St, Nottingham NG1 1LA',
          'primaryColour' => '#000000',
          'secondaryColour' => '#000000',
          'logoUrl' => 'public/images/logos/Nottingham_Lions_Logo.png',
          'players' => array(),
        ),
        array(
          'name' => 'Whitley Warriors',
          'nickname' => 'Warriors',
          'venueName' => 'Whitley Bay Ice Rink',
          'venueAddress' => 'Hillheads Rd, Whitley Bay NE25 8HP',
          'primaryColour' => '#000000',
          'secondaryColour' => '#000000',
          'logoUrl' => 'public/images/logos/Whitley_Warriors_Logo.png',
          'players' => array(),
        ),
        array(
          'name' => 'Solihull Barons',
          'nickname' => 'Barons',
          'venueName' => 'Planet Ice Solihull',
          'venueAddress' => 'Planet Ice, 119 Hobs Moat Rd, Solihull B92 8JN',
          'primaryColour' => '#000000',
          'secondaryColour' => '#000000',
          'logoUrl' => 'public/images/logos/new-logo-150x150-1.png',
          'players' => array(),
        ),
        array(
          'name' => 'Hull Jets',
          'nickname' => 'Jets',
          'venueName' => 'Hull Arena',
          'venueAddress' => 'Kingston St, Hull HU1 2DZ',
          'primaryColour' => '#000000',
          'secondaryColour' => '#000000',
          'logoUrl' => 'public/images/logos/Hull_Jets_Logo-2-320x234.png',
          'players' => array(),
        ),
        array(
          'name' => 'Deeside Dragons',
          'nickname' => 'Dragons',
          'venueName' => 'Deeside Leisure Centre',
          'venueAddress' => 'Chester Rd W, Queensferry, Deeside CH5 1SA',
          'primaryColour' => '#000000',
          'secondaryColour' => '#000000',
          'logoUrl' => 'public/images/logos/Deeside-Dragons-Master-320x376.png',
          'players' => array(),
        ),
        array(
          'name' => 'Blackburn Hawks',
          'nickname' => 'Hawks',
          'venueName' => 'Planet Ice Blackburn Arena',
          'venueAddress' => 'Lower Audley St, Blackburn BB2 3DY',
          'primaryColour' => '#000000',
          'secondaryColour' => '#000000',
          'logoUrl' => 'public/images/logos/BHIHC-New-Logo-Main.png-320x320.webp',
          'players' => array(),
        ),
        array(
          'name' => 'Billingham Stars',
          'nickname' => 'Stars',
          'venueName' => 'Billingham Forum',
          'venueAddress' => 'Town Centre, The Causeway, Stockton-on-Tees, Billingham TS23 2LJ',
          'primaryColour' => '#000000',
          'secondaryColour' => '#000000',
          'logoUrl' => 'public/images/logos/Billingham_Stars_Logo.svg_.png',
          'players' => array(),
        ),
      ];

      $rosterLookup = array();
      foreach($nclubs as $nclub) {
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
        $rosterId =  DB::table('rosters')->insertGetId(['season_id' => $nseason2, 'team_id' => $teamId]);
        $rosterLookup[$nclub["name"]] = array("id" => $rosterId, "venueName" => $nclub["venueName"], "venueAddress" => $nclub["venueAddress"]);
        foreach($nclub["players"] as $nplayer) {
          $playerId = DB::table('players')->insertGetId(['fullName' => $nplayer]);
          DB::table('roster_players')->insertGetId(['player_id' => $playerId , 'roster_id' => $rosterId]);
        }
      }

      $nGames = [
        array('Hull Jets', 'Billingham Stars', '2023-09-09 17:30:00', 'COMPLETED', 'FT', 4, 2, null, null, $nseason2, 'league'),
        array('Billingham Stars', 'Sheffield Scimitars', '2023-09-10 17:30:00', 'COMPLETED', 'FT', 7, 0, null, null, $nseason2, 'league'),
        array('Blackburn Hawks', 'Hull Jets', '2023-09-10 18:00:00', 'COMPLETED', 'FT', 4, 2, null, null, $nseason2, 'league'),
        array('Whitley Warriors', 'Nottingham Lions', '2023-09-10 17:00:00', 'COMPLETED', 'FT', 5, 1, null, null, $nseason2, 'league'),
        array('Billingham Stars', 'Deeside Dragons', '2023-09-16 17:30:00', 'COMPLETED', 'FT', 7, 2, null, null, $nseason2, 'league'),
        array('Nottingham Lions', 'Whitley Warriors', '2023-09-16 13:20:00', 'COMPLETED', 'FT', 0, 2, null, null, $nseason2, 'league'),
        array('Deeside Dragons', 'Billingham Stars', '2023-09-17 17:15:00', 'COMPLETED', 'FT', 3, 8, null, null, $nseason2, 'league'),
        array('Solihull Barons', 'Blackburn Hawks', '2023-09-17 17:30:00', 'COMPLETED', 'FF', 0, 5, null, null, $nseason2, 'league'),
        array('Whitley Warriors', 'Sheffield Scimitars', '2023-09-17 17:00:00', 'COMPLETED', 'FT', 3, 0, null, null, $nseason2, 'league'),
        array('Widnes Wild', 'Nottingham Lions', '2023-09-17 17:30:00', 'COMPLETED', 'OT', 4, 3, null, null, $nseason2, 'league'),
      ];

      // array('', '', '2023-- ::00', 'COMPLETED', 'FT', , , null, null),
      // 'status' => '', // [ UPCOMING, COMPLETED, POSTPONED, TBC ] 
      // 'scoreType' => '', // [ FT, OT, SO, FF]
      // $table->foreignId('season_id')->constrained(); - constant

      foreach($nGames as $game) {
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
          'season_id' => $game[9],
          'type' => $game[10],
        ]);
      }
    }
}
