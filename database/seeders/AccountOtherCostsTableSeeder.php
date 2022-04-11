<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AccountOtherCostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('account_other_costs')->delete();
        
        \DB::table('account_other_costs')->insert(array (
            0 => 
            array (
                'id' => 2,
                'date' => '2021-12-31',
                'amount' => 120.0,
                'description' => 'Book',
                'image' => '202204111400WhatsApp Image 2022-02-14 at 12.55.50.jpeg',
                'created_at' => '2022-04-11 14:00:10',
                'updated_at' => '2022-04-11 14:00:10',
            ),
        ));
        
        
    }
}