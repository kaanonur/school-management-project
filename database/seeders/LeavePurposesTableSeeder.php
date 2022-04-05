<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LeavePurposesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('leave_purposes')->delete();
        
        \DB::table('leave_purposes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Family Problem',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Personel Problem',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Health Problem',
                'created_at' => '2022-04-05 07:49:31',
                'updated_at' => '2022-04-05 07:49:31',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Military Mission',
                'created_at' => '2022-04-05 08:04:53',
                'updated_at' => '2022-04-05 08:04:53',
            ),
        ));
        
        
    }
}