<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MarksGradesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('marks_grades')->delete();
        
        \DB::table('marks_grades')->insert(array (
            0 => 
            array (
                'id' => 1,
                'grade_name' => 'A+',
                'grade_point' => '5',
                'start_marks' => '80',
                'end_marks' => '100',
                'start_point' => '5',
                'end_point' => '5',
                'remarks' => 'Excellent',
                'created_at' => '2022-04-06 14:20:09',
                'updated_at' => '2022-04-15 08:19:13',
            ),
            1 => 
            array (
                'id' => 2,
                'grade_name' => 'A',
                'grade_point' => '4',
                'start_marks' => '70',
                'end_marks' => '79',
                'start_point' => '4',
                'end_point' => '4.99',
                'remarks' => 'Very Good',
                'created_at' => '2022-04-06 14:27:31',
                'updated_at' => '2022-04-15 08:19:31',
            ),
            2 => 
            array (
                'id' => 3,
                'grade_name' => 'A-',
                'grade_point' => '3.5',
                'start_marks' => '60',
                'end_marks' => '69',
                'start_point' => '3.5',
                'end_point' => '3.99',
                'remarks' => 'Good',
                'created_at' => '2022-04-06 14:27:56',
                'updated_at' => '2022-04-15 08:19:54',
            ),
            3 => 
            array (
                'id' => 4,
                'grade_name' => 'B',
                'grade_point' => '3',
                'start_marks' => '50',
                'end_marks' => '59',
                'start_point' => '3',
                'end_point' => '3.49',
                'remarks' => 'Average',
                'created_at' => '2022-04-06 14:28:15',
                'updated_at' => '2022-04-15 08:20:01',
            ),
            4 => 
            array (
                'id' => 5,
                'grade_name' => 'C',
                'grade_point' => '2',
                'start_marks' => '40',
                'end_marks' => '49',
                'start_point' => '2',
                'end_point' => '2.99',
                'remarks' => 'Disappoint',
                'created_at' => '2022-04-06 14:28:34',
                'updated_at' => '2022-04-15 08:20:06',
            ),
            5 => 
            array (
                'id' => 6,
                'grade_name' => 'D',
                'grade_point' => '1',
                'start_marks' => '33',
                'end_marks' => '39',
                'start_point' => '1',
                'end_point' => '1.99',
                'remarks' => 'Bad',
                'created_at' => '2022-04-06 14:28:49',
                'updated_at' => '2022-04-15 08:20:12',
            ),
            6 => 
            array (
                'id' => 7,
                'grade_name' => 'F',
                'grade_point' => '0',
                'start_marks' => '00',
                'end_marks' => '32',
                'start_point' => '0',
                'end_point' => '0.99',
                'remarks' => 'Fail',
                'created_at' => '2022-04-06 14:29:03',
                'updated_at' => '2022-04-15 08:20:18',
            ),
        ));
        
        
    }
}