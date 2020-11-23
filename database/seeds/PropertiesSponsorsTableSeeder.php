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

      $isIn = Carbon::create('2020-11-07')->between('2020-10-30', '2020-11-15');
      dd($isIn);

        //prendo tutte le proprietà
        $properties = Property::all();
        //prendo tutti gli sponsor e conto il numero degli elementi
        $sponsors = Sponsor::all()->toArray();
        $count_sponsor = count($sponsors);

        //ciclo
        foreach ($properties as $property) {
          //scelgo un numero random di sponsor che avrà la proprietà
          $sponsors_number = rand(0, $count_sponsor);
          //ciclo fino a quel numero
          $sponsor_periods = [
            [
              "created_at" => "",
              "end_sponsor" => "",
            ]
          ];

          for($i = 0; $i < $sponsors_number; $i++){
            //seleziono un sponsor casuale
            $sponsor = Sponsor::inRandomOrder()->first();
            $check_date = true;
            while($check_date) {
              // salvo la possibile data di creazione
              $created_at = $faker->dateTimeBetween('-1 year', 'now');

            foreach ($sponsor_periods as $sponsor_period) {
              if (Carbon::create($created_at)->between($sponsor_period['created_at'], $sponsor_period['end_sponsor'])) {

              }

            }
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

              }
            // $sponsor_period = CarbonPeriod::create($created_at, $end_date);

            // $sponsor_period->toArray();

          }
        }



    }
}
