<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('student_groups')->delete();
        
        \DB::table('student_groups')->insert(array (
            0 => 
            array (
                'created_at' => '2022-03-24 08:20:24',
                'id' => 3,
                'name' => 'Art',
                'updated_at' => '2022-03-24 08:20:24',
            ),
            1 => 
            array (
                'created_at' => '2022-03-24 08:20:28',
                'id' => 4,
                'name' => 'Science',
                'updated_at' => '2022-03-24 08:20:28',
            ),
            2 => 
            array (
                'created_at' => '2022-03-24 08:20:34',
                'id' => 5,
                'name' => 'Health',
                'updated_at' => '2022-03-24 08:20:34',
            ),
        ));
        
        
    }
}