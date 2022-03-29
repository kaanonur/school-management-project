<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AssignSubjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('assign_subjects')->delete();
        
        \DB::table('assign_subjects')->insert(array (
            0 => 
            array (
                'class_id' => 3,
                'created_at' => '2022-03-28 11:52:21',
                'full_mark' => 100.0,
                'id' => 7,
                'pass_mark' => 23.0,
                'subject_id' => 2,
                'subjective_mark' => 122.0,
                'updated_at' => '2022-03-28 11:52:21',
            ),
            1 => 
            array (
                'class_id' => 5,
                'created_at' => '2022-03-28 11:52:53',
                'full_mark' => 100.0,
                'id' => 8,
                'pass_mark' => 90.0,
                'subject_id' => 2,
                'subjective_mark' => 80.0,
                'updated_at' => '2022-03-28 11:52:53',
            ),
            2 => 
            array (
                'class_id' => 5,
                'created_at' => '2022-03-28 11:52:53',
                'full_mark' => 200.0,
                'id' => 9,
                'pass_mark' => 180.0,
                'subject_id' => 4,
                'subjective_mark' => 160.0,
                'updated_at' => '2022-03-28 11:52:53',
            ),
            3 => 
            array (
                'class_id' => 5,
                'created_at' => '2022-03-28 11:53:35',
                'full_mark' => 200.0,
                'id' => 10,
                'pass_mark' => 245.0,
                'subject_id' => 3,
                'subjective_mark' => 213.0,
                'updated_at' => '2022-03-28 11:53:35',
            ),
            4 => 
            array (
                'class_id' => 6,
                'created_at' => '2022-03-28 11:53:48',
                'full_mark' => 200.0,
                'id' => 11,
                'pass_mark' => 230.0,
                'subject_id' => 5,
                'subjective_mark' => 2123.0,
                'updated_at' => '2022-03-28 11:53:48',
            ),
            5 => 
            array (
                'class_id' => 1,
                'created_at' => '2022-03-28 12:35:49',
                'full_mark' => 10.0,
                'id' => 18,
                'pass_mark' => 10.0,
                'subject_id' => 2,
                'subjective_mark' => 10.0,
                'updated_at' => '2022-03-28 12:35:49',
            ),
            6 => 
            array (
                'class_id' => 1,
                'created_at' => '2022-03-28 12:35:49',
                'full_mark' => 20.0,
                'id' => 19,
                'pass_mark' => 20.0,
                'subject_id' => 4,
                'subjective_mark' => 20.0,
                'updated_at' => '2022-03-28 12:35:49',
            ),
            7 => 
            array (
                'class_id' => 2,
                'created_at' => '2022-03-28 12:36:06',
                'full_mark' => 100.0,
                'id' => 24,
                'pass_mark' => 20.0,
                'subject_id' => 2,
                'subjective_mark' => 50.0,
                'updated_at' => '2022-03-28 12:36:06',
            ),
            8 => 
            array (
                'class_id' => 2,
                'created_at' => '2022-03-28 12:36:06',
                'full_mark' => 100.0,
                'id' => 25,
                'pass_mark' => 23.0,
                'subject_id' => 3,
                'subjective_mark' => 70.0,
                'updated_at' => '2022-03-28 12:36:06',
            ),
            9 => 
            array (
                'class_id' => 2,
                'created_at' => '2022-03-28 12:36:06',
                'full_mark' => 80.0,
                'id' => 26,
                'pass_mark' => 10.0,
                'subject_id' => 4,
                'subjective_mark' => 30.0,
                'updated_at' => '2022-03-28 12:36:06',
            ),
            10 => 
            array (
                'class_id' => 2,
                'created_at' => '2022-03-28 12:36:06',
                'full_mark' => 200.0,
                'id' => 27,
                'pass_mark' => 50.0,
                'subject_id' => 5,
                'subjective_mark' => 150.0,
                'updated_at' => '2022-03-28 12:36:06',
            ),
        ));
        
        
    }
}