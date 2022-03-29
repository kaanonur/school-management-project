<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DesignationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('designations')->delete();
        
        \DB::table('designations')->insert(array (
            0 => 
            array (
                'created_at' => '2022-03-28 14:03:21',
                'id' => 2,
                'name' => 'Head Teacher',
                'updated_at' => '2022-03-28 14:03:21',
            ),
            1 => 
            array (
                'created_at' => '2022-03-28 14:03:33',
                'id' => 3,
                'name' => 'Asistant Teacher',
                'updated_at' => '2022-03-28 14:03:33',
            ),
            2 => 
            array (
                'created_at' => '2022-03-28 14:03:38',
                'id' => 4,
                'name' => 'Teacher',
                'updated_at' => '2022-03-28 14:03:38',
            ),
        ));
        
        
    }
}