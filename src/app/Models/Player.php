<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';
    protected $guarded = ['id'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
