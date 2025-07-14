<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $guarded = ['id'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}