<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importo il Model
use App\Property;
use Illuminate\Support\Facades\Auth;

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
      if(Auth::check()){
        $email = Auth::user()->email;
      } else {
        $email = "";
      }
      return view("guest.show", compact("property", "email"));
    }

}
