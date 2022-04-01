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
                'created_at' => '2022-04-01 13:18:15',
                'id' => 1,
                'name' => '1st Terminal Exam',
                'updated_at' => '2022-04-01 13:18:15',
            ),
            1 => 
            array (
                'created_at' => '2022-04-01 13:18:22',
                'id' => 2,
                'name' => '2nd Terminal Exam',
                'updated_at' => '2022-04-01 13:18:22',
            ),
            2 => 
            array (
                'created_at' => '2022-04-01 13:18:30',
                'id' => 3,
                'name' => '3rd Terminal Exam',
                'updated_at' => '2022-04-01 13:18:30',
            ),
        ));
        
        
    }
}