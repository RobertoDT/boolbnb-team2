<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Extra;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

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
      if (isset($_GET["search"])) {
        $address = $_GET["search"];
      } else {
        $address = null;
      }

      return view("guest.search", compact('address', 'extras'));

    }


    // metodo per filtrare apartments in radius
    public function filterProperties ()
    {
      // setto una variabile di controllo
      $search_ok = true;
      // CONTROLLO SE ESISTONO I VALORI LAT, LON, RADIUS.
      if (isset($_GET["lat_poi"]) && isset($_GET["lon_poi"]) && isset($_GET["radius"])) {

        // CONTROLLO SE SONO STATI FLEGGATI EXTRAS
        if (isset($_GET["extras"]) && $_GET["extras"] > 0) {
          $extras_guest = $_GET['extras'];
          $extras_guest = explode(',', $extras_guest);
        } else {
          $extras_guest = null;
        }

        // CONTROLLO SE E' STATO SETTATO ROOMS
        if (isset($_GET["rooms"])) {
          $rooms = $_GET['rooms'];
        } else {
          $rooms = 1;
        }

        // CONTROLLO SE E' STATO SETTATO BEDS
        if (isset($_GET["beds"])) {
          $beds = $_GET['beds'];
        } else {
          $beds = 1;
        }

        // CONTROLLO SE E' STATO SETTATO METERS SQUARE
        if (isset($_GET["mq"])) {
          $mq = $_GET['mq'];
        } else {
          $mq = 30;
        }

        // CONTROLLO SE E' STATO SETTATO BATHROOMS
        if (isset($_GET["bathrooms"])) {
          $bathrooms = $_GET['bathrooms'];
        } else {
          $bathrooms = 1;
        }

        // FILTRO DISTANZA + ACTIVE + BEDS + ROOMS + PEOPLE + MQ + BATHROOMS
        $properties_filtered = Property::selectRaw("*,
        ( 6371 * acos( cos( radians(?) ) *
          cos( radians( latitude ) )
          * cos( radians( longitude ) - radians(?)
          ) + sin( radians(?) ) *
          sin( radians( latitude ) ) )
        ) AS distance", [$_GET["lat_poi"], $_GET["lon_poi"], $_GET["lat_poi"]])
        ->having('distance', '<', $_GET["radius"])
        ->where('rooms_number', '>=', $rooms)
        ->where('beds_number', '>=', $beds)
        ->where('bathrooms_number', '>=', $bathrooms)
        ->where('square_meters','>=', $mq)
        ->where('active', 1)
        ->get(); // COLLECTION

        // controllo se esistono risultati altrimenti invio messaggio
        if (count($properties_filtered)) {

          // salvo il valore della data attuale in Carbon
          $now = Carbon::now();

          // ricavo un array di ids delle proprieta' sponsorizzate
          $ids_sponsored = DB::table('property_sponsor')
          ->where('end_sponsor', '>=', $now)
          ->select('property_id')
          ->get()
          ->toArray();
          // converto l'array da key : value a solo value
          $ids_sponsored_only_ids = [];
          for ($i=0; $i < count($ids_sponsored); $i++) {
            $ids_sponsored_only_ids[] = $ids_sponsored[$i]->property_id;
          }

          // CONTROLLO SE CI SONO EXTRAS ALTRIMENTI MANDO AL PROSSIMO PASSAGGIO DIRETTAMENTE
          if ($extras_guest != null) {
            // FILTRO PROPRIETA CHE HANNO EXTRAS RICHIESTI
            $properties_extra_filtered = [];

            // conto il numero degli extras che ha richiesto il guest
            $numb_req_extras = count($extras_guest);
            // ciclo le proprieta' gia' in parte filtrate
            foreach ($properties_filtered as $property) {
              // salvo un contatore che parte da 0
              $find_service = 0;
              // ciclo l'array degli extras scelti dall'utente
              foreach ($extras_guest as $extra_guest) {
                // ciclo l'array degli extras delle proprietà filtrate
                // e confronto i valori con quelli scelti dall'utente se e' valido aumento il contatore
                // altrimenti il dato viene scartato
                foreach ($property->extras as $extra) {
                  if ($extra->id == $extra_guest) {
                    $find_service++;
                  }
                }
              }
              // inserisco in array la proprieta' che ha tutti i servizi
              if ($find_service == $numb_req_extras) {
                $properties_extra_filtered[] = $property->id; // ARRAY DI PROPRIETA'
              }
            }

            // INTERSEZIONE TRA ARRAY EXTRA E SPONSOR

            // FILTRO $properties_extra_filtered ottenendo solo i risultati che sono sponsorizzati
            $properties_extra_sponsored_ids = array_intersect($properties_extra_filtered,$ids_sponsored_only_ids);

            // FILTRO $properties_extra_filtered ottenendo solo i risultati che NON sono sponsorizzati
            $properties_extra_not_sponsored_ids = array_diff($properties_extra_filtered,$properties_extra_sponsored_ids);

            // richiedo i risultati a database degli array con id filtrati
            $properties_sponsored = Property::find($properties_extra_sponsored_ids)->all();
            $properties_not_sponsored = Property::find($properties_extra_not_sponsored_ids)->all();
            // dd($properties_sponsored, $properties_not_sponsored);

          } else {
            // OTTENGO DUE ARRAY CON APPARTAMENTI SPONSORIZZATI E NON

            // ottengo la lista degli appertamenti filtrati e sponsorizzati
            $properties_sponsored_obj = $properties_filtered->whereIn('id', $ids_sponsored_only_ids)->toArray();

            // Dump array with object-arrays
            $properties_sponsored = [];
            foreach($properties_sponsored_obj as $object){
              $properties_sponsored[] = $object;
            }


            // ottengo la lista degli appartamentifiltrati NON sponsorizzati
            $properties_not_sponsored = $properties_filtered->whereNotIn('id', $ids_sponsored_only_ids);

            // dd($ids_sponsored_only_ids, $properties_filtered, $properties_sponsored, $properties_not_sponsored);

          }
        } else {
          $search_ok = false;
        }
      } else {
        $search_ok = false;
      }

      // ritorna un JSON all'api
      if ($search_ok == true) {
        return Response::json(array('sponsored'=>$properties_sponsored,'not_sponsored'=>$properties_not_sponsored));

        // altrimenti ritorna nessun risultato
      } else {
        // return response()->json('Mi dispiace nessun risultato');
        return Response::json(['results' => 'La tua ricerca non ha prodotto alcun risultato'], 404);
      }
    }
}


