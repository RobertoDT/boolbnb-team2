<?php

use Illuminate\Database\Seeder;

//importiamo i Model
use App\Extra;

class ExtrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $extras = [
          "wi-fi",
          "parking",
          "pool",
          "reception",
          "sauna",
          "sea-view"
        ];

        foreach ($extras as $extra) {
          $newExtra = new Extra;

          $newExtra->name = $extra;

          $time = new DateTime('now');
          $newtime = $time->modify('-1 year')->format('Y-m-d H:i');
          $newExtra->created_at = $newtime;
          $newExtra->updated_at = $newtime;

          $newExtra->save();
        }
    }
}
