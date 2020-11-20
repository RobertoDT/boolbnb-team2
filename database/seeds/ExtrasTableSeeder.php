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

          $newExtra->save();
        }
    }
}
