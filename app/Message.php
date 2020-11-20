<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//importiamo i nostri Model
use App\Property;

class Message extends Model
{
    public function property()
    {
      return $this->belongsTo("App\Property");
    }
}
