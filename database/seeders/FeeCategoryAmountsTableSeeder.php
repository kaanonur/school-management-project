<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeeCategoryAmountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fee_category_amounts')->delete();
        
        \DB::table('fee_category_amounts')->insert(array (
            0 => 
            array (
                'amount' => 100.0,
                'class_id' => 2,
                'created_at' => '2022-03-24 13:43:49',
                'fee_category_id' => 2,
                'id' => 1,
                'updated_at' => '2022-03-24 13:43:49',
            ),
            1 => 
            array (
                'amount' => 200.0,
                'class_id' => 3,
                'created_at' => '2022-03-24 13:43:49',
                'fee_category_id' => 2,
                'id' => 2,
                'updated_at' => '2022-03-24 13:43:49',
            ),
            2 => 
            array (
                'amount' => 122.0,
                'class_id' => 3,
                'created_at' => '2022-03-25 11:36:53',
                'fee_category_id' => 1,
                'id' => 3,
                'updated_at' => '2022-03-25 11:36:53',
            ),
            3 => 
            array (
                'amount' => 50.0,
                'class_id' => 1,
                'created_at' => '2022-03-25 12:38:32',
                'fee_category_id' => 3,
                'id' => 10,
                'updated_at' => '2022-03-25 12:38:32',
            ),
            4 => 
            array (
                'amount' => 60.0,
                'class_id' => 2,
                'created_at' => '2022-03-25 12:38:32',
                'fee_category_id' => 3,
                'id' => 11,
                'updated_at' => '2022-03-25 12:38:32',
            ),
            5 => 
            array (
                'amount' => 70.0,
                'class_id' => 3,
                'created_at' => '2022-03-25 12:38:32',
                'fee_category_id' => 3,
                'id' => 12,
                'updated_at' => '2022-03-25 12:38:32',
            ),
        ));
        
        
    }
}