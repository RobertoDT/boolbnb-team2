<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertiesSearchController extends Controller
{
    //metodo index
    public function search()
    {
      $properties = Property::all();
      return response()->json(compact("properties"));
    }

}
