<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\quiz;
use Illuminate\Database\Eloquent\Model;



class category extends Model
{

    protected $table="category";
    protected $fillable=['category','file_path','type'];

    public function categorytest()
    {
        return $this->hasMany(quiz::class, 'category', 'id' );
    }
    
    
    
}
