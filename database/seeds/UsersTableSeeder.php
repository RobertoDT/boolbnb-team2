<?php

use Illuminate\Database\Seeder;

//importo il faker generator
use Faker\Generator as Faker;
//importo il Model
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for($i = 0; $i < 10; $i++){
        //creiamo un nuovo user
        $newUser = new User;

        $newUser->firstname = $faker->firstName();
        $newUser->lastname = $faker->lastName;
        $newUser->date_of_birth = $faker->dateTimeBetween("-80 years", "-18 years");
        $newUser->email = $faker->freeEmail();
        $newUser->password = Hash::make($faker->password());
        $time = new DateTime('now');
        $newtime = $time->modify('-1 year')->format('Y-m-d H:i');
        $newUser->created_at = $newtime;
        $newUser->updated_at = $newtime;

        //salvo l'oggetto
        $newUser->save();
      }

    }
}
