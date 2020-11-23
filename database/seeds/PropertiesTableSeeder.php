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

        // https://source.unsplash.com/random?sig={{randomNumber}}

        $mq = $faker->numberBetween(30, 500);
        if($mq <= 100){
          $newProperty->flat_image = "https://source.unsplash.com/random?apartment=".$user->id;
          $newProperty->rooms_number = $faker->numberBetween(1, 4);
          if($newProperty->rooms_number <= 2){
            $newProperty->bathrooms_number = 1;
          } else {
            $newProperty->bathrooms_number = $faker->numberBetween(1, 2);
          }
          $newProperty->beds_number = $faker->numberBetween(1, 4);
        } elseif($mq > 100 && $mq <= 250){
          $newProperty->flat_image = "https://source.unsplash.com/random?house=".$user->id;
          $newProperty->rooms_number = $faker->numberBetween(3, 6);
          if($newProperty->rooms_number <= 3){
            $newProperty->bathrooms_number = 1;
            $newProperty->beds_number = $faker->numberBetween(2, 4);
          } else {
            $newProperty->bathrooms_number = 2;
            $newProperty->beds_number = $faker->numberBetween(4, 8);
          }
        } else {
          $newProperty->flat_image = "https://source.unsplash.com/random?villa=".$user->id;
          $newProperty->rooms_number = $faker->numberBetween(6, 12);
          if($newProperty->rooms_number <= 7){
            $newProperty->beds_number = $faker->numberBetween(6, 10);
            $newProperty->bathrooms_number = $faker->numberBetween(2, 3);
          } else {
            $newProperty->beds_number = $faker->numberBetween(9, 15);
            $newProperty->bathrooms_number = $faker->numberBetween(3, 4);
          }
        }

        $newProperty->square_meters = $mq;
        $newProperty->latitude = $faker->randomFloat(6, -90, 90);
        $newProperty->longitude = $faker->randomFloat(6, -180, 180);
        $newProperty->active = rand(0, 1);
        $time = new DateTime('now');
        $newtime = $time->modify('-1 year')->format('Y-m-d H:i');
        $newProperty->created_at = $newtime;
        $newProperty->updated_at = $newtime;

        $newProperty->save();
      }
    }
}
