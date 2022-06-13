<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crtsorag extends Model
{
   protected $fillable=['ady','sorag','barlag1','barlag2','jogap','bal','category'];

   public function crtsorag()
   {

      return $this->belongsTo(category::class, 'category', 'id');
   }

   public function ctf()
   {
      return $this->belongsTo(category::class, 'category', 'id');
   }
}
