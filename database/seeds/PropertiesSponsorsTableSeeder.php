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
      $sponsors_qty = rand(0, 10);
      //ciclo fino a quel numero
      $sponsor_periods = [];

      for($i = 0; $i < $sponsors_qty; $i++){
        //seleziono un sponsor casuale
        $sponsor = Sponsor::inRandomOrder()->first();
        $new_date = false;

        while(!$new_date) {
          // salvo la possibile data di creazione
          $created_at = $faker->dateTimeBetween('-1 year', 'now');
          $notInArray = true;
          foreach ($sponsor_periods as $sponsor_period) {
            if (Carbon::create($created_at->getTimestamp())->between($sponsor_period['created_at'], $sponsor_period['end_sponsor'])) {
              $notInArray = false;
            }
          }

          if ($notInArray) {
            // trasformo in formato leggibile per Carbon
            $date_format = $created_at->getTimestamp();
            // trasformo la data in formato Carbon
            $date_format = Carbon::createFromTimeStamp($date_format);
            // aggiungo la durata dello sponsor e la trasformo in formato per DB
            $end_date = $date_format->addHours($sponsor->duration)->format('Y-m-d H:i');
            // salvo lo sponsor nella tabella pivot e anche la colonna created_AT e l'end_date
            $sponsor->properties()->attach(
              $property,
              ['created_at' => $created_at, 'end_sponsor' => $end_date]
            );
            // salvo nell'array i due risultati e blocco il ciclo while
            $sponsor_periods[] = ['created_at'=> $created_at, 'end_sponsor' => $end_date];
            $new_date = true;
          }
        }
      }
    }
  }
}
