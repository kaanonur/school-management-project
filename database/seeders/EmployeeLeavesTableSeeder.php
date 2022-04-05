<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeLeavesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('employee_leaves')->delete();
        
        
        
    }
}