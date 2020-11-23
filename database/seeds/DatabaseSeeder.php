<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PropertiesTableSeeder::class);
        $this->call(ViewsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(ExtrasTableSeeder::class);
        $this->call(PropertiesExtrasTableSeeder::class);
        $this->call(SponsorsTableSeeder::class);
        $this->call(PropertiesSponsorsTableSeeder::class);
    }
}
