<?php

use Illuminate\Database\Seeder;

/**
 * Class MainMenuTableSeeder
 */
class MainMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_menu')->insert(
            [
                [
                    'created_at' => date('Y-m-d H:i:s'),
                    'name' => 'Услуги',
                    'alias' => 'Services',
                    'parent_id' => 1,
                    'active' => 1,
                    'path' => '/services'
                ],
                [
                    'created_at' => date('Y-m-d H:i:s'),
                    'name' => 'Кейсы',
                    'alias' => 'Portfolio',
                    'parent_id' => 1,
                    'active' => 1,
                    'path' => '/portfolio'
                ]
            ]
        );
    }
}
