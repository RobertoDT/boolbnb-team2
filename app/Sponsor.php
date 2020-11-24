<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//importiamo i nostri Model
use App\Property;

class Sponsor extends Model
{
  public function properties()
  {
    return $this->belongsToMany("App\Property", "property_sponsor")->withPivot('created_at', 'end_sponsor');
  }
}
