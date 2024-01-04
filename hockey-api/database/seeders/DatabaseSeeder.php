<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\Team;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
      
      $clubId1 = DB::table('clubs')->insertGetId([
        'name' => 'Sheffield Bears',
        'nickname' => 'Bears',
        'description' => 'University ice hockey club based out of Sheffield',
        'venueName' => 'Ice Sheffield',
        'venueAddress' => 'Coleridge Road, S22BZ',
        'primaryColour' => '#D7D019',
        'secondaryColour' => '#000000',
      ]);

      $teamId1 = DB::table('teams')->insertGetId([
        'name' => 'Sheffield Bears A',
        'nickname' => 'Bears A',
        'description' => 'University ice hockey club based out of Sheffield',
        'venueName' => 'Ice Sheffield',
        'venueAddress' => 'Coleridge Road, S22BZ',
        'primaryColour' => '#D7D019',
        'secondaryColour' => '#000000',
        'club_id' => $clubId1,
      ]);

      $teamId2 = DB::table('teams')->insertGetId([
        'name' => 'Sheffield Bears B',
        'nickname' => 'Bears B',
        'venueName' => 'Ice Sheffield',
        'venueAddress' => 'Coleridge Road, S22BZ',
        'primaryColour' => '#D7D019',
        'secondaryColour' => '#000000',
        'club_id' => $clubId1,
      ]);

      $players = Player::factory()->count(50)->create();

      $this->call([
          RecSeeder::class,
          LeagueSeeder::class,
      ]);
    }
}
