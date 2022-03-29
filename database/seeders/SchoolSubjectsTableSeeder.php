<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SchoolSubjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('school_subjects')->delete();
        
        \DB::table('school_subjects')->insert(array (
            0 => 
            array (
                'created_at' => '2022-03-28 07:03:56',
                'id' => 2,
                'name' => 'English',
                'updated_at' => '2022-03-28 07:03:56',
            ),
            1 => 
            array (
                'created_at' => '2022-03-28 07:04:02',
                'id' => 3,
                'name' => 'Health',
                'updated_at' => '2022-03-28 07:04:02',
            ),
            2 => 
            array (
                'created_at' => '2022-03-28 11:34:24',
                'id' => 4,
                'name' => 'Turkish',
                'updated_at' => '2022-03-28 11:34:24',
            ),
            3 => 
            array (
                'created_at' => '2022-03-28 11:35:00',
                'id' => 5,
                'name' => 'Mathematics',
                'updated_at' => '2022-03-28 11:35:00',
            ),
        ));
        
        
    }
}