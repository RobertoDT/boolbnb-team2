<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
//models
use App\View;
use App\Property;

class ViewController extends Controller
{
    public function index($id) {

        $property = Property::find($id);
        return view("admin.properties.statistics", compact("property"));
    }

    public function getStatistics()
    {
      if(isset($_GET["property_id"]) && isset($_GET["date_request"])){
        $property_id = $_GET["property_id"];
        $date_request = $_GET["date_request"];
      } else{
        abort(404);
      }

      $begin_month = Carbon::parse($date_request);
      $end_month = Carbon::parse($date_request)->endOfMonth();

      DB::table('views')
      ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
      ->groupBy('date')
      ->get();

      $visitorTraffic = View::where('created_at', '>=', $begin_month)
        ->where('property_id', $property_id)
        ->where('created_at', '<=', $end_month)
        ->groupBy('date')
        ->orderBy('date', 'ASC')
        ->get(array(
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as "views"')
      ))
      ->toArray();

      //controllo ($visitorTraffic == null) se non ci sono dati. stampare "non ci sono dati del periodo selezionato" e gli faccio la back
      if($visitorTraffic == null){
        return Response::json(["no_results_message" =>"Non ci sono dati nel periodo selezionato"]);
      }

      $labels = [];
      $data = [];

      foreach ($visitorTraffic as $day_views) {
        $labels[] = $day_views["date"];
        $data[] = $day_views["views"];
      }

      $daysInMonth = $begin_month->daysInMonth;
      if(count($labels) != $daysInMonth){
        $newLabels = [];
        $newData = [];
        $j = 0;
        for ($i=0; $i < $daysInMonth; $i++) {
          $carbonLabel = Carbon::parse($labels[$j]);
          if ($begin_month->eq($carbonLabel)) {
            $newLabels[] = $begin_month->format('Y-m-d');
            $newData[] = $data[$j];
            if ($j < count($labels) - 1) {
              $j++;
            }
          } else {
            $newLabels[] = $begin_month->format('Y-m-d');
            $newData[] = 0;
          }
          $begin_month->addDays(1);
        }
        $labels = $newLabels;
        $data = $newData;
      }


      return Response::json(array("labels" => $labels, "data" => $data));

    }
}
