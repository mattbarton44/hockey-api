<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function rosters()
    {
        return $this->hasMany(Roster::class);
    }
    
    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
