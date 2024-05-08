<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function seasons()
    {
        return $this->hasMany(Season::class)->orderBy('startDate', 'desc');
    }
}
