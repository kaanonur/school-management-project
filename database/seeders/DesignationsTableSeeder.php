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
                'id' => 2,
                'name' => 'Head Teacher',
                'created_at' => '2022-03-28 14:03:21',
                'updated_at' => '2022-03-28 14:03:21',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Asistant Teacher',
                'created_at' => '2022-03-28 14:03:33',
                'updated_at' => '2022-03-28 14:03:33',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Teacher',
                'created_at' => '2022-03-28 14:03:38',
                'updated_at' => '2022-03-28 14:03:38',
            ),
        ));
        
        
    }
}