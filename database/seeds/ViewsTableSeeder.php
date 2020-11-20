<?php

use Illuminate\Database\Seeder;
//importiamo il faker generator
use Faker\Generator as Faker;
//importiamo i Model
use App\Property;
use App\View;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 30; $i++){
          $property = Property::inRandomOrder()->first();

          //creo nuovo oggetto
          $newView = new View;

          $newView->property_id = $property->id;
          $newView->created_at = $faker->dateTimeBetween("-10 years", "now");

          //salvo
          $newView->save();
        }
    }
}
