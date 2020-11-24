<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

use App\Property;
use App\Sponsor;


class PropertiesSponsorsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker $faker)
  {
    //prendo tutte le proprietà
    $properties = Property::all();

    //ciclo
    foreach ($properties as $property) {
      //scelgo un numero random di sponsor che avrà la proprietà
      $sponsors_qty = 8;
      //salvo un array vuoto
      $periods = [];
      $i = 0;
      while ($i <= $sponsors_qty) {
        $sponsor = Sponsor::inRandomOrder()->first();
        $isUnique = true;
        
        if (empty($periods)) {
          $created_at = $faker->dateTimeBetween("-1 year", "now");
          $created_at = Carbon::parse($created_at);
        } else {
          foreach ($periods as $period) {
            $created_at = $faker->dateTimeBetween("-1 year", "now");
            $created_at = Carbon::parse($created_at);
            $inArray = $created_at->between($period['created_at'], $period['end_sponsor']);          
            if ($inArray == true) {
              $isUnique = false;
            }
          }
        }

        if ($isUnique == true) {
          // aggiungo le ore al created_at
          $end_date = $created_at->addHours($sponsor->duration);
          dd($end_date);
          // salvo le due date nell'array 
          $periods[] = ['created_at'=> $created_at, 'end_sponsor' => $end_date];
          // inserisco i dati a db
          $created_at->format('Y-m-d H:i');
          $end_date->format('Y-m-d H:i');
          $sponsor->properties()->attach(
            $property,
            ['created_at' => $created_at, 'end_sponsor' => $end_date]
          );
          // incremento contatore
          $i++;
        }

      }

      // for($i = 0; $i < $sponsors_qty; $i++){
      //   //seleziono un sponsor casuale
      //   $sponsor = Sponsor::inRandomOrder()->first();
      //   // $new_date = false;

      //   // while($new_date == false) {
      //   //   // salvo la possibile data di creazione
      //   //   $created_at = $faker->dateTimeBetween('-1 year', 'now');
      //   //   // $notInArray = true;
      //   //   foreach ($sponsor_periods as $sponsor_period) {
      //   //     $created_at = Carbon::create($created_at->getTimestamp());
      //   //     dd($created_at);
      //   //     if ($created_at->between($sponsor_period['created_at'], $sponsor_period['end_sponsor'])) {
      //   //       // $notInArray = false;

      //   //     }
      //   //   }

      //     // if ($notInArray) {
      //     //   // // trasformo in formato leggibile per Carbon
      //     //   // $date_format = $created_at->getTimestamp();
      //     //   // // trasformo la data in formato Carbon
      //     //   // $date_format = Carbon::createFromTimeStamp($date_format);
      //     //   // aggiungo la durata dello sponsor e la trasformo in formato per DB
      //     //   $end_date = $created_at->addHours($sponsor->duration)->format('Y-m-d H:i');
      //     //   // salvo lo sponsor nella tabella pivot e anche la colonna created_AT e l'end_date
      //     //   $sponsor->properties()->attach(
      //     //     $property,
      //     //     ['created_at' => $created_at, 'end_sponsor' => $end_date]
      //     //   );
      //     //   // salvo nell'array i due risultati e blocco il ciclo while
      //     //   $sponsor_periods[] = ['created_at'=> $created_at, 'end_sponsor' => $end_date];
      //     //   $new_date = true;
      //     // }
      //   }
    }
  }
}

