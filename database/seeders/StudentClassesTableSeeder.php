<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentClassesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('student_classes')->delete();
        
        \DB::table('student_classes')->insert(array (
            0 => 
            array (
                'created_at' => '2022-03-23 14:19:39',
                'id' => 1,
                'name' => 'Class One',
                'updated_at' => '2022-03-23 14:27:23',
            ),
            1 => 
            array (
                'created_at' => '2022-03-23 14:20:10',
                'id' => 2,
                'name' => 'Class Two',
                'updated_at' => '2022-03-23 14:20:10',
            ),
            2 => 
            array (
                'created_at' => '2022-03-23 14:20:19',
                'id' => 3,
                'name' => 'Class Three',
                'updated_at' => '2022-03-23 14:20:19',
            ),
            3 => 
            array (
                'created_at' => '2022-03-28 11:32:49',
                'id' => 5,
                'name' => 'Class Four',
                'updated_at' => '2022-03-28 11:32:49',
            ),
            4 => 
            array (
                'created_at' => '2022-03-28 11:33:41',
                'id' => 6,
                'name' => 'Class Five',
                'updated_at' => '2022-03-28 11:33:41',
            ),
        ));
        
        
    }
}