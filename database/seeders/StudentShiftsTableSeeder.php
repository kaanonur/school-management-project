<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentShiftsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('student_shifts')->delete();
        
        \DB::table('student_shifts')->insert(array (
            0 => 
            array (
                'created_at' => '2022-03-24 08:35:27',
                'id' => 1,
                'name' => 'Shift A',
                'updated_at' => '2022-03-24 08:35:27',
            ),
            1 => 
            array (
                'created_at' => '2022-03-24 08:35:33',
                'id' => 2,
                'name' => 'Shift B',
                'updated_at' => '2022-03-24 08:35:33',
            ),
            2 => 
            array (
                'created_at' => '2022-03-24 08:35:37',
                'id' => 3,
                'name' => 'Shift C',
                'updated_at' => '2022-03-24 08:37:46',
            ),
        ));
        
        
    }
}