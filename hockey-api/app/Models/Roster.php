<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function players()
    {
        return $this->hasMany(RosterPlayer::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
