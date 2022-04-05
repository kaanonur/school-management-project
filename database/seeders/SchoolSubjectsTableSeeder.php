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
                'id' => 1,
                'name' => 'Math',
                'created_at' => '2022-04-05 13:12:46',
                'updated_at' => '2022-04-05 13:12:46',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'English',
                'created_at' => '2022-04-05 13:12:51',
                'updated_at' => '2022-04-05 13:12:51',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Turkish',
                'created_at' => '2022-04-05 13:34:11',
                'updated_at' => '2022-04-05 13:34:11',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Health',
                'created_at' => '2022-04-05 13:34:16',
                'updated_at' => '2022-04-05 13:34:16',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Geography',
                'created_at' => '2022-04-05 13:34:25',
                'updated_at' => '2022-04-05 13:34:25',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'History',
                'created_at' => '2022-04-05 13:34:46',
                'updated_at' => '2022-04-05 13:34:46',
            ),
        ));
        
        
    }
}