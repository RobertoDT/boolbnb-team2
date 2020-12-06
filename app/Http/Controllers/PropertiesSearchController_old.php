<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Extra;

class PropertiesSearchController extends Controller
{
    //metodo getProperties per ottenere un json con le proprietà

    public function getProperties()
    {

      $properties = Property::all();
      
      return response()->json(compact("properties"));
    }
    
    //metodo index per mostrare pagina di ricerca
    public function index ()
    {
      $extras = Extra::all();
      $address = $_GET["search"];
      return view("guest.search", compact('address', 'extras'));
    }

    // metodi che restituisce se due cordinate sono all'interno di un raggio
    public function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {  
      $earth_radius = 6371;
    
      $dLat = deg2rad($latitude2 - $latitude1);  
      $dLon = deg2rad($longitude2 - $longitude1);  
    
      $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);  
      $c = 2 * asin(sqrt($a));  
      $d = $earth_radius * $c;  
    
      return $d;  
    }

    // metodo per filtrare apartments in radius
    public function filterProperties ()
    {
      $lat_poi = $_GET["lat_poi"];
      $lon_poi = $_GET["lon_poi"];
      $radius = $_GET["radius"];
      if (isset($_GET["extras"])) {
        $extras = $_GET['extras'];
      } else {
        $extras = null;
      }
      // prendo tutte le proprieta
      $properties = Property::all();
      // creo array vuoto per contenere le prop che sono nel radius
      $results = [];
      // filtro i risultati in base alla distanza dal raggio 
      foreach ($properties as $property) {
        $lat_prop = $property->latitude;
        $lon_prop = $property->longitude;
        $distance = $this->getDistance($lat_poi, $lon_poi, $lat_prop, $lon_prop);
        if ($distance < $radius) {
          if($extras != null){
            if(count(array_diff($property->extras, $extras)) == 0){
              // $results[] =  $property; altro modo per pushare in php
              array_push($results, $property);
            }
          } else {
            $results[] =  $property;
          }
        }
      }
      return response()->json($results);
    }
}