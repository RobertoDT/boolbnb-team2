<?php

use Illuminate\Database\Seeder;

//impotiamo i Model
use App\Property;
use App\Extra;

class PropertiesExtrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //prendo tutte le proprietà
      $properties = Property::all();
      //prendo tutti gli extra
      $extras = Extra::all()->toArray();
      //contiamo il numero di extra all'interno dell'array
      $count_extra = count($extras);

      //ciclo
      foreach ($properties as $property) {
        //scelgo un numero random di servizi che avrà la proprietà
        $extras_number = rand(0, $count_extra);
        $extra_list = [];
        $i = 0;
        while($i < $extras_number){
          $extra_choice = Extra::inRandomOrder()->first();

          if(!in_array($extra_choice, $extra_list)) {
            $extra_list[] = $extra_choice;
            $extra_choice->properties()->attach($property->id);
            $i++;
          }
        }
      }
    }
}
