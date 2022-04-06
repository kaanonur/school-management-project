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
                'created_at' => '2022-04-06 14:20:09',
                'end_marks' => '100',
                'end_point' => '5.00',
                'grade_name' => 'A+',
                'grade_point' => '5.00',
                'id' => 1,
                'remarks' => 'Excellent',
                'start_marks' => '80',
                'start_point' => '5.00',
                'updated_at' => '2022-04-06 14:20:09',
            ),
            1 => 
            array (
                'created_at' => '2022-04-06 14:27:31',
                'end_marks' => '79',
                'end_point' => '4.99',
                'grade_name' => 'A',
                'grade_point' => '4.00',
                'id' => 2,
                'remarks' => 'Very Good',
                'start_marks' => '70',
                'start_point' => '4.00',
                'updated_at' => '2022-04-06 14:27:31',
            ),
            2 => 
            array (
                'created_at' => '2022-04-06 14:27:56',
                'end_marks' => '69',
                'end_point' => '3.99',
                'grade_name' => 'A-',
                'grade_point' => '3.50',
                'id' => 3,
                'remarks' => 'Good',
                'start_marks' => '60',
                'start_point' => '3.50',
                'updated_at' => '2022-04-06 14:27:56',
            ),
            3 => 
            array (
                'created_at' => '2022-04-06 14:28:15',
                'end_marks' => '59',
                'end_point' => '3.49',
                'grade_name' => 'B',
                'grade_point' => '3.00',
                'id' => 4,
                'remarks' => 'Average',
                'start_marks' => '50',
                'start_point' => '3.00',
                'updated_at' => '2022-04-06 14:28:15',
            ),
            4 => 
            array (
                'created_at' => '2022-04-06 14:28:34',
                'end_marks' => '49',
                'end_point' => '2.99',
                'grade_name' => 'C',
                'grade_point' => '2.00',
                'id' => 5,
                'remarks' => 'Disappoint',
                'start_marks' => '40',
                'start_point' => '2.00',
                'updated_at' => '2022-04-06 14:28:34',
            ),
            5 => 
            array (
                'created_at' => '2022-04-06 14:28:49',
                'end_marks' => '39',
                'end_point' => '1.99',
                'grade_name' => 'D',
                'grade_point' => '1.00',
                'id' => 6,
                'remarks' => 'Bad',
                'start_marks' => '33',
                'start_point' => '1.00',
                'updated_at' => '2022-04-06 14:28:49',
            ),
            6 => 
            array (
                'created_at' => '2022-04-06 14:29:03',
                'end_marks' => '32',
                'end_point' => '0.99',
                'grade_name' => 'F',
                'grade_point' => '0.00',
                'id' => 7,
                'remarks' => 'Fail',
                'start_marks' => '00',
                'start_point' => '0.00',
                'updated_at' => '2022-04-06 14:29:03',
            ),
        ));
        
        
    }
}