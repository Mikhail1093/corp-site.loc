<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //вызываем все неоходимые миграции в одноме методе
        Model::unguard();
        // $this->call(UsersTableSeeder::class); example
        $this->call(NewVaMenuTableSeeder::class);
        $this->call(MainMenuTableSeeder::class);

        Model::reguard();
    }
}
