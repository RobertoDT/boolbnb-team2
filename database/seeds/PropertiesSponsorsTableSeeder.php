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
                  for($i = 0; $i < $sponsors_number; $i++){
                    //seleziono un sponsor casuale
                    $sponsor = Sponsor::inRandomOrder()->first();
                    // salvo la possibile data di creazione
                    $created_at = $faker->dateTimeBetween('-1 year', 'now');
                    // trasformo in formato leggibile per Carbon
                    $date_format = $created_at->getTimestamp();
                    // trasformo la data in formato Carbon
                    $date_format = Carbon::createFromTimeStamp($date_format);
                    dd($date_format);
                    // aggiungo la durata dello sponsor e la trasformo in formato per DB
                    $end_date = $date_format->addHours($sponsor->duration)->format('Y-m-d H:i');
                    // salvo lo sponsor nella tabella pivot e anche la colonna created_AT e l'end_date
                    $sponsor->properties()->attach(
                        $property, 
                        ['created_at' => $created_at, 'end_sponsor' => $end_date]
                    );
                  }
                }
    }
}
