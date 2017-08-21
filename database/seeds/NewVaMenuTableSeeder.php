<?php

use Illuminate\Database\Seeder;

class NewVaMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('our_services')->insert(
            [
                [
                    'created_at' => date('Y-m-d H:i:s'),
                    'name'       => 'test name 1',
                    'text'       => 'test text1',
                    'active'     => 1
                ],
                [
                    'created_at' => date('Y-m-d H:i:s'),
                    'name'       => 'test name 2',
                    'text'       => 'test text2',
                    'active'     => 1
                ]
            ]
        );
    }
}
