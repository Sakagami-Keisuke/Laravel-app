<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //query builder
        DB::table('users')->insert([
            [
                'name' => 'Keisuke Sakagami',  // 'name' =>Str::random(10),
                'email' => 'iwayasunset@gmail.com',  // 'email'=>Str::random(10),
                'password' => Hash::make('admin'),
            ], [
                'name' => 'テストユーザーA',
                'email' => 'testA@test.com',
                'password' => Hash::make('test123'),
            ], [
                'name' => 'テストユーザーB',
                'email' => 'testB@test.com',
                'password' => Hash::make('test456'),
            ]
        ]);
    }
}
