<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//importiamo i Model
use App\Property;

class Extra extends Model
{
    public function properties()
    {
      return $this->belongsToMany("App\Property", "property_extra");
    }
}
