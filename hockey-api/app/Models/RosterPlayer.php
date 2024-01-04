<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RosterPlayer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function roster()
    {
        return $this->belongsTo(Roster::class);
    }
}
