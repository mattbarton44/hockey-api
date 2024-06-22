<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function home_team()
    {
        return $this->belongsTo(Roster::class, 'home_team_id');
    }

    public function away_team()
    {
        return $this->belongsTo(Roster::class, 'away_team_id');
    }

    public function players()
    {
        return $this->hasMany(GamePlayer::class);
    }
    
    public function events()
    {
        return $this->hasMany(GameEvent::class);
    }

    public function statistics()
    {
        return $this->hasMany(GameStatistic::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
