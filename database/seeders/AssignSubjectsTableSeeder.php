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
                'id' => 1,
                'class_id' => 1,
                'subject_id' => 1,
                'full_mark' => 100.0,
                'pass_mark' => 50.0,
                'subjective_mark' => 70.0,
                'created_at' => '2022-04-05 13:14:43',
                'updated_at' => '2022-04-05 13:14:43',
            ),
            1 => 
            array (
                'id' => 2,
                'class_id' => 2,
                'subject_id' => 2,
                'full_mark' => 100.0,
                'pass_mark' => 50.0,
                'subjective_mark' => 70.0,
                'created_at' => '2022-04-05 13:35:32',
                'updated_at' => '2022-04-05 13:35:32',
            ),
            2 => 
            array (
                'id' => 3,
                'class_id' => 2,
                'subject_id' => 3,
                'full_mark' => 100.0,
                'pass_mark' => 50.0,
                'subjective_mark' => 70.0,
                'created_at' => '2022-04-05 13:35:32',
                'updated_at' => '2022-04-05 13:35:32',
            ),
            3 => 
            array (
                'id' => 4,
                'class_id' => 3,
                'subject_id' => 4,
                'full_mark' => 100.0,
                'pass_mark' => 50.0,
                'subjective_mark' => 70.0,
                'created_at' => '2022-04-05 13:35:46',
                'updated_at' => '2022-04-05 13:35:46',
            ),
            4 => 
            array (
                'id' => 5,
                'class_id' => 5,
                'subject_id' => 6,
                'full_mark' => 100.0,
                'pass_mark' => 50.0,
                'subjective_mark' => 70.0,
                'created_at' => '2022-04-05 13:36:04',
                'updated_at' => '2022-04-05 13:36:04',
            ),
            5 => 
            array (
                'id' => 6,
                'class_id' => 5,
                'subject_id' => 5,
                'full_mark' => 100.0,
                'pass_mark' => 50.0,
                'subjective_mark' => 70.0,
                'created_at' => '2022-04-05 13:36:04',
                'updated_at' => '2022-04-05 13:36:04',
            ),
            6 => 
            array (
                'id' => 7,
                'class_id' => 6,
                'subject_id' => 2,
                'full_mark' => 100.0,
                'pass_mark' => 50.0,
                'subjective_mark' => 70.0,
                'created_at' => '2022-04-05 13:36:42',
                'updated_at' => '2022-04-05 13:36:42',
            ),
            7 => 
            array (
                'id' => 8,
                'class_id' => 6,
                'subject_id' => 3,
                'full_mark' => 100.0,
                'pass_mark' => 50.0,
                'subjective_mark' => 70.0,
                'created_at' => '2022-04-05 13:36:42',
                'updated_at' => '2022-04-05 13:36:42',
            ),
            8 => 
            array (
                'id' => 9,
                'class_id' => 6,
                'subject_id' => 4,
                'full_mark' => 100.0,
                'pass_mark' => 50.0,
                'subjective_mark' => 70.0,
                'created_at' => '2022-04-05 13:36:42',
                'updated_at' => '2022-04-05 13:36:42',
            ),
            9 => 
            array (
                'id' => 10,
                'class_id' => 6,
                'subject_id' => 5,
                'full_mark' => 100.0,
                'pass_mark' => 50.0,
                'subjective_mark' => 70.0,
                'created_at' => '2022-04-05 13:36:42',
                'updated_at' => '2022-04-05 13:36:42',
            ),
            10 => 
            array (
                'id' => 11,
                'class_id' => 6,
                'subject_id' => 6,
                'full_mark' => 100.0,
                'pass_mark' => 50.0,
                'subjective_mark' => 70.0,
                'created_at' => '2022-04-05 13:36:42',
                'updated_at' => '2022-04-05 13:36:42',
            ),
        ));
        
        
    }
}