<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DiscountStudentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('discount_students')->delete();
        
        \DB::table('discount_students')->insert(array (
            0 => 
            array (
                'id' => 1,
                'assign_student_id' => 1,
                'fee_category_id' => 1,
                'discount' => 5.0,
                'created_at' => '2022-03-29 09:31:42',
                'updated_at' => '2022-03-29 09:31:42',
            ),
            1 => 
            array (
                'id' => 6,
                'assign_student_id' => 6,
                'fee_category_id' => 1,
                'discount' => 12.0,
                'created_at' => '2022-03-31 14:21:52',
                'updated_at' => '2022-03-31 14:21:52',
            ),
        ));
        
        
    }
}