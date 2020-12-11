<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importo il Model
use App\Property;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\View;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    //metodo index
    public function index()
    {
      $now = Carbon::now();
      $ids_sponsored = DB::table('property_sponsor')
          ->where('end_sponsor', '>=', $now)
          ->select('property_id')
          ->get()
          ->toArray();
      $array_ids = [];

      foreach ($ids_sponsored as $id_sponsored) {

        $array_ids[] = $id_sponsored->property_id;

      }
      $sponsored_properties = Property::whereIn('id', $array_ids)->where('active', 1)->skip(0)->take(4)
      ->get();
      $not_sponsored_properties = Property::whereNotIn('id', $array_ids)->where('active', 1)->skip(0)->take(9)
      ->get();


      return view ("guest.index", compact('sponsored_properties', 'not_sponsored_properties'));

    }

    //metodo show
    public function show($id)
    {
      $property = Property::find($id);
      $new_view = new View;

      $new_view->property_id = $id;

      $new_view->save();

      if(Auth::check()){
        $email = Auth::user()->email;
      } else {
        $email = "";
      }
      return view("guest.show", compact("property", "email"));
    }

}
