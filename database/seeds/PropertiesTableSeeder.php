<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\User;
use App\Property;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for($i = 0; $i < 40; $i++){
        //seleziono uno user randomico
        $user = User::inRandomOrder()->first();
        //creo nuovo oggetto proprietà
        $newProperty = new Property;

        $newProperty->user_id = $user->id;
        $newProperty->title = $faker->sentence(5);
        $newProperty->description = $faker->paragraphs(2, true);
        $newProperty->rooms_number = $faker->randomDigitNot(0);
        $newProperty->beds_number = $faker->randomDigitNot(0);
        $newProperty->bathrooms_number = $faker->numberBetween(1, 3);
        $newProperty->flat_image = "https://source.unsplash.com/1600x900/?house";
        $newProperty->square_meters = $faker->numberBetween(50, 150);
        $newProperty->latitude = $faker->randomFloat(6, -90, 90);
        $newProperty->longitude = $faker->randomFloat(6, -180, 180);
        $newProperty->active = rand(0, 1);

        $newProperty->save();
      }
    }
}
