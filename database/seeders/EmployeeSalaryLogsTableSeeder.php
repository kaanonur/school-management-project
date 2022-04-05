<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeSalaryLogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('employee_salary_logs')->delete();
        
        \DB::table('employee_salary_logs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'employee_id' => 23,
                'previous_salary' => 3000,
                'present_salary' => 3000,
                'increment_salary' => 0,
                'effected_salary' => '2022-04-04',
                'created_at' => '2022-04-04 08:35:51',
                'updated_at' => '2022-04-04 08:35:51',
            ),
            1 => 
            array (
                'id' => 3,
                'employee_id' => 23,
                'previous_salary' => 3000,
                'present_salary' => 7000,
                'increment_salary' => 4000,
                'effected_salary' => '1970-01-01',
                'created_at' => '2022-04-04 11:59:48',
                'updated_at' => '2022-04-04 11:59:48',
            ),
            2 => 
            array (
                'id' => 4,
                'employee_id' => 26,
                'previous_salary' => 2200,
                'present_salary' => 2200,
                'increment_salary' => 0,
                'effected_salary' => '2022-04-01',
                'created_at' => '2022-04-05 07:48:55',
                'updated_at' => '2022-04-05 07:48:55',
            ),
        ));
        
        
    }
}