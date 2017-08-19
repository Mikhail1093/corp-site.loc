<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use OurServicesTableSeeder;
use MainMenuTableSeeder;

//use OurServivesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // $this->call(UsersTableSeeder::class); example
        $this->call(OurServicesTableSeeder::class);
        $this->call(MainMenuTableSeeder::class);

        Model::reguard();
    }
}
