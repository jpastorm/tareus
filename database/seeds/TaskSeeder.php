<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'id_users' => 2,
                'id_courses' => 1,
                'name' => 'Tarea importante',
                'description'=> 'Descripcion de la tarea importante aea',
                'file'=>'file.txt',
           //     'created_at' => date('Y-m-d H:m:s'),
             //   'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'id_users' => 2,
                'id_courses' => 1,
                'name' => 'Tarea importante dos',
                'description'=> 'Descripcion de la tarea importante dos aea',
                'file'=>'file.txt',
               // 'created_at' => date('Y-m-d H:m:s'),
                //'updated_at' => date('Y-m-d H:m:s'),
            ],
        ]);
    }
}
