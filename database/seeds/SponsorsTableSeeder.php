<?php

use Illuminate\Database\Seeder;
//importiamo i Model
use App\Sponsor;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //array contenente oggetti con chiave/valore
      $sponsors = [
        [
          "name" => "silver",
          "price" => 2.99,
          "duration" => 24
        ],
        [
          "name" => "gold",
          "price" => 5.99,
          "duration" => 72
        ],
        [
          "name" => "platinum",
          "price" => 9.99,
          "duration" => 144
        ],
      ];

      foreach ($sponsors as $sponsor) {
        //creiamo il nuovo oggetto
        $newSponsor = new Sponsor;
        $newSponsor->name = $sponsor['name'];
        $newSponsor->price = $sponsor['price'];
        $newSponsor->duration = $sponsor['duration'];
        $time = new DateTime('now');
        $newtime = $time->modify('-1 year')->format('Y-m-d H:i');
        $newSponsor->created_at = $newtime;
        $newSponsor->updated_at = $newtime;

        $newSponsor->save();
      }
    }
}
