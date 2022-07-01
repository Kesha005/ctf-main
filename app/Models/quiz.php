<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    protected $fillable = [

        'ady',
        'sorag',
        'maglumat',
        'jogap',
        'bal',
        'category',
        'file_path',
    ];
    public function quiz()
    {
 
       return $this->belongsTo(category::class, 'category', 'id');
    }

    public function ctf1()
    {
        return $this->belongsTo(category::class, 'category', 'id');
    }
}
