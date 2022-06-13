<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class game_timer extends Model
{
    protected $fillable = ['added_time', 'status'];

    protected $casts=['added_time'=>'datetime:F-d-Y H:i:s',];
}
