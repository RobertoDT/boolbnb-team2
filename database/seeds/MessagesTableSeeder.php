<?php

use Illuminate\Database\Seeder;

//importiamo il faker generator
use Faker\Generator as Faker;
//importiamo i nostri Model
use App\Property;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for($i = 0; $i < 50; $i++){
        $property = Property::inRandomOrder()->first();

        $newMessage = new Message;

        $newMessage->property_id = $property->id;
        $newMessage->email = $faker->freeEmail();
        $newMessage->text = $faker->paragraphs(5, true);
        $date = $faker->dateTimeBetween("-1 year", "now");
        $newMessage->created_at = $date;
        $newMessage->updated_at = $date;

        $newMessage->save();
      }
    }
}
