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
                'class_id' => 1,
                'created_at' => '2022-04-01 09:19:15',
                'fee_category_id' => 1,
                'id' => 1,
                'updated_at' => '2022-04-01 09:19:15',
            ),
            1 => 
            array (
                'amount' => 200.0,
                'class_id' => 2,
                'created_at' => '2022-04-01 09:19:15',
                'fee_category_id' => 1,
                'id' => 2,
                'updated_at' => '2022-04-01 09:19:15',
            ),
            2 => 
            array (
                'amount' => 300.0,
                'class_id' => 3,
                'created_at' => '2022-04-01 09:19:15',
                'fee_category_id' => 1,
                'id' => 3,
                'updated_at' => '2022-04-01 09:19:15',
            ),
            3 => 
            array (
                'amount' => 400.0,
                'class_id' => 5,
                'created_at' => '2022-04-01 09:19:15',
                'fee_category_id' => 1,
                'id' => 4,
                'updated_at' => '2022-04-01 09:19:15',
            ),
            4 => 
            array (
                'amount' => 500.0,
                'class_id' => 6,
                'created_at' => '2022-04-01 09:19:15',
                'fee_category_id' => 1,
                'id' => 5,
                'updated_at' => '2022-04-01 09:19:15',
            ),
            5 => 
            array (
                'amount' => 50.0,
                'class_id' => 1,
                'created_at' => '2022-04-01 09:19:42',
                'fee_category_id' => 2,
                'id' => 6,
                'updated_at' => '2022-04-01 09:19:42',
            ),
            6 => 
            array (
                'amount' => 60.0,
                'class_id' => 2,
                'created_at' => '2022-04-01 09:19:42',
                'fee_category_id' => 2,
                'id' => 7,
                'updated_at' => '2022-04-01 09:19:42',
            ),
            7 => 
            array (
                'amount' => 70.0,
                'class_id' => 3,
                'created_at' => '2022-04-01 09:19:42',
                'fee_category_id' => 2,
                'id' => 8,
                'updated_at' => '2022-04-01 09:19:42',
            ),
            8 => 
            array (
                'amount' => 80.0,
                'class_id' => 5,
                'created_at' => '2022-04-01 09:19:42',
                'fee_category_id' => 2,
                'id' => 9,
                'updated_at' => '2022-04-01 09:19:42',
            ),
            9 => 
            array (
                'amount' => 90.0,
                'class_id' => 6,
                'created_at' => '2022-04-01 09:19:42',
                'fee_category_id' => 2,
                'id' => 10,
                'updated_at' => '2022-04-01 09:19:42',
            ),
            10 => 
            array (
                'amount' => 100.0,
                'class_id' => 1,
                'created_at' => '2022-04-01 09:20:04',
                'fee_category_id' => 3,
                'id' => 11,
                'updated_at' => '2022-04-01 09:20:04',
            ),
            11 => 
            array (
                'amount' => 100.0,
                'class_id' => 2,
                'created_at' => '2022-04-01 09:20:04',
                'fee_category_id' => 3,
                'id' => 12,
                'updated_at' => '2022-04-01 09:20:04',
            ),
            12 => 
            array (
                'amount' => 100.0,
                'class_id' => 3,
                'created_at' => '2022-04-01 09:20:04',
                'fee_category_id' => 3,
                'id' => 13,
                'updated_at' => '2022-04-01 09:20:04',
            ),
            13 => 
            array (
                'amount' => 100.0,
                'class_id' => 5,
                'created_at' => '2022-04-01 09:20:04',
                'fee_category_id' => 3,
                'id' => 14,
                'updated_at' => '2022-04-01 09:20:04',
            ),
            14 => 
            array (
                'amount' => 100.0,
                'class_id' => 6,
                'created_at' => '2022-04-01 09:20:04',
                'fee_category_id' => 3,
                'id' => 15,
                'updated_at' => '2022-04-01 09:20:04',
            ),
        ));
        
        
    }
}