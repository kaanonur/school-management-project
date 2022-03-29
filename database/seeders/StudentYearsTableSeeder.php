<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentYearsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('student_years')->delete();
        
        \DB::table('student_years')->insert(array (
            0 => 
            array (
                'created_at' => '2022-03-24 07:09:37',
                'id' => 1,
                'name' => '2019',
                'updated_at' => '2022-03-24 07:09:37',
            ),
            1 => 
            array (
                'created_at' => '2022-03-24 07:09:41',
                'id' => 2,
                'name' => '2020',
                'updated_at' => '2022-03-24 07:09:41',
            ),
            2 => 
            array (
                'created_at' => '2022-03-24 07:09:47',
                'id' => 3,
                'name' => '2021',
                'updated_at' => '2022-03-24 07:09:47',
            ),
            3 => 
            array (
                'created_at' => '2022-03-24 07:09:53',
                'id' => 4,
                'name' => '2022',
                'updated_at' => '2022-03-24 07:09:53',
            ),
        ));
        
        
    }
}