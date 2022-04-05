<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeAttendancesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('employee_attendances')->delete();
        
        \DB::table('employee_attendances')->insert(array (
            0 => 
            array (
                'id' => 7,
                'employee_id' => 23,
                'date' => '2022-05-08',
                'attend_status' => 'Absent',
                'created_at' => '2022-04-05 10:06:13',
                'updated_at' => '2022-04-05 10:06:13',
            ),
            1 => 
            array (
                'id' => 8,
                'employee_id' => 26,
                'date' => '2022-05-08',
                'attend_status' => 'Absent',
                'created_at' => '2022-04-05 10:06:13',
                'updated_at' => '2022-04-05 10:06:13',
            ),
            2 => 
            array (
                'id' => 9,
                'employee_id' => 23,
                'date' => '2022-03-28',
                'attend_status' => 'Leave',
                'created_at' => '2022-04-05 10:06:28',
                'updated_at' => '2022-04-05 10:06:28',
            ),
            3 => 
            array (
                'id' => 10,
                'employee_id' => 26,
                'date' => '2022-03-28',
                'attend_status' => 'Leave',
                'created_at' => '2022-04-05 10:06:28',
                'updated_at' => '2022-04-05 10:06:28',
            ),
            4 => 
            array (
                'id' => 19,
                'employee_id' => 23,
                'date' => '2022-04-05',
                'attend_status' => 'Absent',
                'created_at' => '2022-04-05 12:13:24',
                'updated_at' => '2022-04-05 12:13:24',
            ),
            5 => 
            array (
                'id' => 20,
                'employee_id' => 26,
                'date' => '2022-04-05',
                'attend_status' => 'Present',
                'created_at' => '2022-04-05 12:13:24',
                'updated_at' => '2022-04-05 12:13:24',
            ),
            6 => 
            array (
                'id' => 21,
                'employee_id' => 23,
                'date' => '2022-04-23',
                'attend_status' => 'Absent',
                'created_at' => '2022-04-05 12:13:38',
                'updated_at' => '2022-04-05 12:13:38',
            ),
            7 => 
            array (
                'id' => 22,
                'employee_id' => 26,
                'date' => '2022-04-23',
                'attend_status' => 'Present',
                'created_at' => '2022-04-05 12:13:38',
                'updated_at' => '2022-04-05 12:13:38',
            ),
        ));
        
        
    }
}