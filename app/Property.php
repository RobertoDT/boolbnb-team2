<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//importiamo i nostri Model
use App\User;
use App\View;
use App\Message;
use App\Extra;
use App\Sponsor;

class Property extends Model
{
    public function user()
    {
      return $this->belongsTo("App\User");
    }

    public function views()
    {
      return $this->hasMany("App\View");
    }

    public function messages()
    {
      return $this->hasMany("App\Message");
    }

    public function extras()
    {
      return $this->belongsToMany("App\Extra", "property_extra");
    }

    public function sponsors()
    {
      return $this->belongsToMany("App\Sponsor", "property_sponsor")->withPivot('created_at', 'end_sponsor');
    }
}
