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
          $newProperty->flat_image = "https://source.unsplash.com/random/1024x600?apartment-interiors=".$user->id;
          $newProperty->rooms_number = $faker->numberBetween(1, 4);
          if($newProperty->rooms_number <= 2){
            $newProperty->bathrooms_number = 1;
          } else {
            $newProperty->bathrooms_number = $faker->numberBetween(1, 2);
          }
          $newProperty->beds_number = $faker->numberBetween(1, 4);
        } elseif($mq > 100 && $mq <= 250){
          $newProperty->flat_image = "https://source.unsplash.com/random/1024x600?little-house=".$user->id;
          $newProperty->rooms_number = $faker->numberBetween(3, 6);
          if($newProperty->rooms_number <= 3){
            $newProperty->bathrooms_number = 1;
            $newProperty->beds_number = $faker->numberBetween(2, 4);
          } else {
            $newProperty->bathrooms_number = 2;
            $newProperty->beds_number = $faker->numberBetween(4, 8);
          }
        } else {
          $newProperty->flat_image = "https://source.unsplash.com/random/1024x600?villa=".$user->id;
          $newProperty->rooms_number = $faker->numberBetween(6, 12);
          if($newProperty->rooms_number <= 7){
            $newProperty->beds_number = $faker->numberBetween(6, 10);
            $newProperty->bathrooms_number = $faker->numberBetween(2, 3);
          } else {
            $newProperty->beds_number = $faker->numberBetween(9, 15);
            $newProperty->bathrooms_number = $faker->numberBetween(3, 4);
          }
        }

        // partendo da un array con le principali citta calcolo ne pesco una casualmente e creo delle cordinate vicine
        $cities = [
          // milano
          [
              'lat' => 45.46362,
              'lon' => 9.18812,
              'metropolis' => 'Milano',
              'country' => 'Italia'
          ],
          // venezia
          [
              'lat' => 45.43461,
              'lon' => 12.33891,
              'metropolis' => 'Venezia',
              'country' => 'Italia'
          ],
          // firenze
          [
              'lat' => 43.7687,
              'lon' => 11.25693,
              'metropolis' => 'Firenze',
              'country' => 'Italia'
          ],
          // roma
          [
              'lat' => 41.89056,
              'lon' => 12.49427,
              'metropolis' => 'Roma',
              'country' => 'Italia'
          ],
          //perugia
          [
              'lat' => 43.0977,
              'lon' => 12.3838,
              'metropolis' => 'Perugia',
              'country' => 'Italia'
          ],
          //torino
          [
              'lat' => 45.0781,
              'lon' => 7.6761,
              'metropolis' => 'Torino',
              'country' => 'Italia'
          ],
          //bologna
          [
              'lat' => 44.5075,
              'lon' => 11.3514,
              'metropolis' => 'Bologna',
              'country' => 'Italia'
          ]
          // // costa smeralda
          // [
          //     'lat' => 40.7229,
          //     'lon' => 9.68709
          // ],
          // // gallipoli
          // [
          //     'lat' => 40.05618,
          //     'lon' => 17.97882,
          //     'address' => 'Gallipoli, Italia'
          // ],
        ];

        // scelgo una citta casuale
        $city = $cities[mt_rand(0,count($cities)-1)];
        // discosto in maniera random il valore in modo da creare un punto vicino la città
        $rand_numb = round((1 / (mt_rand(1,10000))),5);
        $rand_value  = mt_rand(0,1) == 1 ? 1 : -1;
        $lat = $city['lat'] + ($rand_value * $rand_numb);
        $lon = $city['lon'] + ($rand_value * $rand_numb);
        $metropolis = $city['metropolis'];
        $country = $city['country'];
        // salvo le cordinate a database
        $newProperty->latitude = $lat;
        $newProperty->longitude = $lon;
        $newProperty->metropolis = $metropolis;
        $newProperty->country = $country;
        // faker cordinates
        // $newProperty->latitude = $faker->latitude(-90, 90);
        // $newProperty->longitude = $faker->longitude(-180, 180);

        $newProperty->square_meters = $mq;
        $newProperty->active = rand(0, 2) == 0 ? 0 : 1;
        $time = new DateTime('now');
        $newtime = $time->modify('-1 year')->format('Y-m-d H:i');
        $newProperty->created_at = $newtime;
        $newProperty->updated_at = $newtime;


        $newProperty->save();
      }
    }
}
