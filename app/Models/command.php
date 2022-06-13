<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class command extends Model
{
    protected $fillable=['name','scores','answered'];

    public function commanding()
    {
        return $this->hasMany(User::class, 'command', 'id');
    }
}