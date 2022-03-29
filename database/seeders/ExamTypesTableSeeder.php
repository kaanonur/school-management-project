<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExamTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('exam_types')->delete();
        
        \DB::table('exam_types')->insert(array (
            0 => 
            array (
                'created_at' => '2022-03-28 06:34:29',
                'id' => 2,
                'name' => '1st Terminal Exam',
                'updated_at' => '2022-03-28 06:34:29',
            ),
            1 => 
            array (
                'created_at' => '2022-03-28 06:34:36',
                'id' => 3,
                'name' => '2nd Terminal Exam',
                'updated_at' => '2022-03-28 06:34:36',
            ),
            2 => 
            array (
                'created_at' => '2022-03-28 06:34:43',
                'id' => 4,
                'name' => '3rd Terminal Exam',
                'updated_at' => '2022-03-28 06:34:43',
            ),
        ));
        
        
    }
}