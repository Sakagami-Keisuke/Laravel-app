<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            [
                'id' => 1,
                'name' => 'Tokyo',
                'sort_no' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Osaka',
                'sort_no' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Fukuoka',
                'sort_no' => 3,
            ]
        ]);
    }
}
