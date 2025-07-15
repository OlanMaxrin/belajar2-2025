<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $guarded = ['id'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
