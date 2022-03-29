<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeeCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fee_categories')->delete();
        
        \DB::table('fee_categories')->insert(array (
            0 => 
            array (
                'created_at' => '2022-03-24 09:11:58',
                'id' => 1,
                'name' => 'Registration Fee',
                'updated_at' => '2022-03-24 09:11:58',
            ),
            1 => 
            array (
                'created_at' => '2022-03-24 09:12:07',
                'id' => 2,
                'name' => 'Monthly Fee',
                'updated_at' => '2022-03-24 09:12:07',
            ),
            2 => 
            array (
                'created_at' => '2022-03-24 09:12:14',
                'id' => 3,
                'name' => 'Exam Fee',
                'updated_at' => '2022-03-24 09:12:14',
            ),
        ));
        
        
    }
}