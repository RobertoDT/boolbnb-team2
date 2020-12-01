<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertiesSearchController extends Controller
{
    //metodo getProperties per ottenere un json con le proprietà

    public function getProperties()
    {

      $properties = Property::all();
      
      return response()->json(compact("properties"));
    }
      //metodo index per mostrare pagina di ricerca

    public function index (Request $request)
    {
      $data = $request->all();
      $string = $data['search']; 
      return view("guest.search", compact('string'));
    }

    // metodi per filtrare i risultati

    // metodo per filtrare apartments in radius
    public function getPropertiesInRadius ($latitude1, $longitude1, $latitude2, $longitude2, $radius)
    {
      // prendo tutte le proprieta
      $properties = Property::all();
      // filtro i risultati in base alla distanza dal raggio 
      foreach ($properties as $property) {
        $distance = $this->getDistance($latitude1, $longitude1, $latitude2, $longitude2);
        if ($distance < $radius) {
          // pusho proprieta
        }
  
      }
      // ritorno un jason con solo i risultati filtrati 
      return response()->json(compact("properties"));
    }


    public function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {  
      $earth_radius = 6371;
    
      $dLat = deg2rad($latitude2 - $latitude1);  
      $dLon = deg2rad($longitude2 - $longitude1);  
    
      $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);  
      $c = 2 * asin(sqrt($a));  
      $d = $earth_radius * $c;  
    
      return $d;  
    }
}


