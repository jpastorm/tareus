<?php

use Illuminate\Database\Seeder;

class RolusersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rolusers')->insert([
           [
               'description' => 'Admin',
               'created_at' => date('Y-m-d H:m:s'),
               'updated_at' => date('Y-m-d H:m:s'),
           ],
            [
                'description' => 'Usuario',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ]
        ]);
    }
}
