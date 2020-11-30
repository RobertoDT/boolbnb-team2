<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Carbon\Carbon;

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
    // richiedo tutte le proprietà del sito
    $properties = Property::all();

    // eseguo un ciclo di ogni proprietà
    foreach ($properties as $property) {

      // numero di sponsor che avrà la proprietà
      $sponsor_qty = rand(0,10);
      // contatore
      $i = 0;

      // genero un ciclo while per ogni qty di sponsor
      // finche non inserisco a db un dato che non si interseca
      // con nessuno dei created e end_sponsor della proprieta in questione
      while ($i <= $sponsor_qty) {
        // genero una data faker per lo sponsor
        $new_sponsor_dt = $faker->dateTimeBetween("-1 year", "now");
        // $new_sponsor_dt = '2020-10-15 20:55';

        // salvo la nuova data in formato carbon
        $new_dt_carbon = Carbon::parse($new_sponsor_dt);

        // salvo una variabile interruttore
        $isDouble = false;
        // controllo se esistono valori a db
        if (isset($property->sponsors)) {
          // eseguo un ciclo per ogni sponsor che ha la proprietà
          foreach ($property->sponsors as $sponsor) {
            // prendo i valori esistenti di inizio e di fine di ogni sponsor
            $created_at = $sponsor->pivot->created_at;
            $end_sponsor = $sponsor->pivot->end_sponsor;

            // confronto i valori con la funzione between di Carbon
            $inArray = $new_dt_carbon->between($created_at, $end_sponsor);
            if ($inArray) {
              $isDouble = true;
            }
          }
        }

        // controllo se isDouble è stato attivato in caso contrario vado a salvare il valore a db
        if ($isDouble == false) {
          // scelgo random uno sponsor (24,72,144);
          $sponsor = Sponsor::inRandomOrder()->first();
          // calcolo la data del termine dello sponsor
          $end_new_sponsor = $new_dt_carbon->addHours($sponsor->duration)->format('Y-m-d H:i');
          // creo la relazione e inserisco i dati created e end_sponsor
          $sponsor->properties()->attach(
            $property,
            ['created_at' => $new_sponsor_dt, 'end_sponsor' => $end_new_sponsor]
          );
          $i++;
        }
      }
    }
  }
}
