<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id_rolusers' => '1',
                'username'=>'jpastorm',
                'password'=> Hash::make('123456'),
                'email'=> 'jpastorm@gmail.com',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'id_rolusers' => '2',
                'username'=>'jp',
                'password'=> Hash::make('123456'),
                'email'=> 'jp@gmail.com',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ]
        ]);
    }
}
