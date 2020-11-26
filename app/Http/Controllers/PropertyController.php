<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importo il Model
use App\Property;

class PropertyController extends Controller
{
    //metodo index
    public function index()
    {
      $properties = Property::all();
      return view ("guest.index", compact("properties"));
    }

    //metodo show
    public function show($id)
    {
      $property = Property::find($id);
      return view("guest.show", compact("property"));
    }

}
