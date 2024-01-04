<?php

namespace App\Models;

use App\Collections\TeamCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function rosters()
    {
        return $this->hasMany(Roster::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
