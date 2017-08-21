<?php

use Illuminate\Database\Seeder;

class CategotiesBlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_catigories')->insert(
            [
                [
                    'created_at' => date('Y-m-d H:i:s'),
                    'active'     => 1,
                    'name'       => 'Маркетинг',
                    'alias'      => 'marketing'
                ],
                [
                    'created_at' => date('Y-m-d H:i:s'),
                    'active'     => 1,
                    'name'       => 'Сегментация лидов',
                    'alias'      => 'leads_segmentation'
                ]
            ]
        );
    }

    /**
     *
     */
    /*private function SeedFromDbBuilder()
    {

    }*/
}
