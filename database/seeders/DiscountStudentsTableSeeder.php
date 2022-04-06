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
                'assign_student_id' => 1,
                'created_at' => '2022-03-29 09:31:42',
                'discount' => 5.0,
                'fee_category_id' => 1,
                'id' => 1,
                'updated_at' => '2022-03-29 09:31:42',
            ),
            1 => 
            array (
                'assign_student_id' => 492,
                'created_at' => '2022-04-06 09:35:51',
                'discount' => 15.0,
                'fee_category_id' => 1,
                'id' => 498,
                'updated_at' => '2022-04-06 09:35:51',
            ),
            2 => 
            array (
                'assign_student_id' => 493,
                'created_at' => '2022-04-06 09:35:52',
                'discount' => 14.0,
                'fee_category_id' => 1,
                'id' => 499,
                'updated_at' => '2022-04-06 09:35:52',
            ),
            3 => 
            array (
                'assign_student_id' => 494,
                'created_at' => '2022-04-06 09:35:52',
                'discount' => 25.0,
                'fee_category_id' => 1,
                'id' => 500,
                'updated_at' => '2022-04-06 09:35:52',
            ),
            4 => 
            array (
                'assign_student_id' => 495,
                'created_at' => '2022-04-06 09:35:52',
                'discount' => 13.0,
                'fee_category_id' => 1,
                'id' => 501,
                'updated_at' => '2022-04-06 09:35:52',
            ),
            5 => 
            array (
                'assign_student_id' => 496,
                'created_at' => '2022-04-06 09:35:53',
                'discount' => 16.0,
                'fee_category_id' => 1,
                'id' => 502,
                'updated_at' => '2022-04-06 09:35:53',
            ),
            6 => 
            array (
                'assign_student_id' => 497,
                'created_at' => '2022-04-06 09:35:53',
                'discount' => 13.0,
                'fee_category_id' => 1,
                'id' => 503,
                'updated_at' => '2022-04-06 09:35:53',
            ),
            7 => 
            array (
                'assign_student_id' => 498,
                'created_at' => '2022-04-06 09:35:54',
                'discount' => 14.0,
                'fee_category_id' => 1,
                'id' => 504,
                'updated_at' => '2022-04-06 09:35:54',
            ),
            8 => 
            array (
                'assign_student_id' => 499,
                'created_at' => '2022-04-06 09:35:54',
                'discount' => 14.0,
                'fee_category_id' => 1,
                'id' => 505,
                'updated_at' => '2022-04-06 09:35:54',
            ),
            9 => 
            array (
                'assign_student_id' => 500,
                'created_at' => '2022-04-06 09:35:54',
                'discount' => 25.0,
                'fee_category_id' => 1,
                'id' => 506,
                'updated_at' => '2022-04-06 09:35:54',
            ),
            10 => 
            array (
                'assign_student_id' => 501,
                'created_at' => '2022-04-06 09:35:55',
                'discount' => 7.0,
                'fee_category_id' => 1,
                'id' => 507,
                'updated_at' => '2022-04-06 09:35:55',
            ),
            11 => 
            array (
                'assign_student_id' => 502,
                'created_at' => '2022-04-06 09:35:55',
                'discount' => 19.0,
                'fee_category_id' => 1,
                'id' => 508,
                'updated_at' => '2022-04-06 09:35:55',
            ),
            12 => 
            array (
                'assign_student_id' => 503,
                'created_at' => '2022-04-06 09:35:56',
                'discount' => 21.0,
                'fee_category_id' => 1,
                'id' => 509,
                'updated_at' => '2022-04-06 09:35:56',
            ),
            13 => 
            array (
                'assign_student_id' => 504,
                'created_at' => '2022-04-06 09:36:00',
                'discount' => 10.0,
                'fee_category_id' => 1,
                'id' => 510,
                'updated_at' => '2022-04-06 09:36:00',
            ),
            14 => 
            array (
                'assign_student_id' => 505,
                'created_at' => '2022-04-06 09:36:01',
                'discount' => 23.0,
                'fee_category_id' => 1,
                'id' => 511,
                'updated_at' => '2022-04-06 09:36:01',
            ),
            15 => 
            array (
                'assign_student_id' => 506,
                'created_at' => '2022-04-06 09:36:01',
                'discount' => 17.0,
                'fee_category_id' => 1,
                'id' => 512,
                'updated_at' => '2022-04-06 09:36:01',
            ),
            16 => 
            array (
                'assign_student_id' => 507,
                'created_at' => '2022-04-06 09:36:01',
                'discount' => 18.0,
                'fee_category_id' => 1,
                'id' => 513,
                'updated_at' => '2022-04-06 09:36:01',
            ),
            17 => 
            array (
                'assign_student_id' => 508,
                'created_at' => '2022-04-06 09:36:02',
                'discount' => 13.0,
                'fee_category_id' => 1,
                'id' => 514,
                'updated_at' => '2022-04-06 09:36:02',
            ),
            18 => 
            array (
                'assign_student_id' => 509,
                'created_at' => '2022-04-06 09:36:02',
                'discount' => 21.0,
                'fee_category_id' => 1,
                'id' => 515,
                'updated_at' => '2022-04-06 09:36:02',
            ),
            19 => 
            array (
                'assign_student_id' => 510,
                'created_at' => '2022-04-06 09:36:03',
                'discount' => 13.0,
                'fee_category_id' => 1,
                'id' => 516,
                'updated_at' => '2022-04-06 09:36:03',
            ),
            20 => 
            array (
                'assign_student_id' => 511,
                'created_at' => '2022-04-06 09:36:03',
                'discount' => 19.0,
                'fee_category_id' => 1,
                'id' => 517,
                'updated_at' => '2022-04-06 09:36:03',
            ),
            21 => 
            array (
                'assign_student_id' => 512,
                'created_at' => '2022-04-06 09:36:15',
                'discount' => 19.0,
                'fee_category_id' => 1,
                'id' => 518,
                'updated_at' => '2022-04-06 09:36:15',
            ),
            22 => 
            array (
                'assign_student_id' => 513,
                'created_at' => '2022-04-06 09:36:15',
                'discount' => 8.0,
                'fee_category_id' => 1,
                'id' => 519,
                'updated_at' => '2022-04-06 09:36:15',
            ),
            23 => 
            array (
                'assign_student_id' => 514,
                'created_at' => '2022-04-06 09:36:17',
                'discount' => 12.0,
                'fee_category_id' => 1,
                'id' => 520,
                'updated_at' => '2022-04-06 09:36:17',
            ),
            24 => 
            array (
                'assign_student_id' => 515,
                'created_at' => '2022-04-06 09:36:17',
                'discount' => 24.0,
                'fee_category_id' => 1,
                'id' => 521,
                'updated_at' => '2022-04-06 09:36:17',
            ),
            25 => 
            array (
                'assign_student_id' => 516,
                'created_at' => '2022-04-06 09:36:18',
                'discount' => 5.0,
                'fee_category_id' => 1,
                'id' => 522,
                'updated_at' => '2022-04-06 09:36:18',
            ),
            26 => 
            array (
                'assign_student_id' => 517,
                'created_at' => '2022-04-06 09:36:18',
                'discount' => 6.0,
                'fee_category_id' => 1,
                'id' => 523,
                'updated_at' => '2022-04-06 09:36:18',
            ),
            27 => 
            array (
                'assign_student_id' => 518,
                'created_at' => '2022-04-06 09:36:18',
                'discount' => 24.0,
                'fee_category_id' => 1,
                'id' => 524,
                'updated_at' => '2022-04-06 09:36:18',
            ),
            28 => 
            array (
                'assign_student_id' => 519,
                'created_at' => '2022-04-06 09:36:19',
                'discount' => 25.0,
                'fee_category_id' => 1,
                'id' => 525,
                'updated_at' => '2022-04-06 09:36:19',
            ),
            29 => 
            array (
                'assign_student_id' => 520,
                'created_at' => '2022-04-06 09:36:19',
                'discount' => 23.0,
                'fee_category_id' => 1,
                'id' => 526,
                'updated_at' => '2022-04-06 09:36:19',
            ),
            30 => 
            array (
                'assign_student_id' => 521,
                'created_at' => '2022-04-06 09:36:20',
                'discount' => 9.0,
                'fee_category_id' => 1,
                'id' => 527,
                'updated_at' => '2022-04-06 09:36:20',
            ),
            31 => 
            array (
                'assign_student_id' => 522,
                'created_at' => '2022-04-06 09:36:20',
                'discount' => 7.0,
                'fee_category_id' => 1,
                'id' => 528,
                'updated_at' => '2022-04-06 09:36:20',
            ),
            32 => 
            array (
                'assign_student_id' => 523,
                'created_at' => '2022-04-06 09:36:20',
                'discount' => 20.0,
                'fee_category_id' => 1,
                'id' => 529,
                'updated_at' => '2022-04-06 09:36:20',
            ),
            33 => 
            array (
                'assign_student_id' => 524,
                'created_at' => '2022-04-06 09:36:21',
                'discount' => 22.0,
                'fee_category_id' => 1,
                'id' => 530,
                'updated_at' => '2022-04-06 09:36:21',
            ),
            34 => 
            array (
                'assign_student_id' => 525,
                'created_at' => '2022-04-06 09:36:21',
                'discount' => 22.0,
                'fee_category_id' => 1,
                'id' => 531,
                'updated_at' => '2022-04-06 09:36:21',
            ),
            35 => 
            array (
                'assign_student_id' => 526,
                'created_at' => '2022-04-06 09:36:22',
                'discount' => 20.0,
                'fee_category_id' => 1,
                'id' => 532,
                'updated_at' => '2022-04-06 09:36:22',
            ),
            36 => 
            array (
                'assign_student_id' => 527,
                'created_at' => '2022-04-06 09:36:22',
                'discount' => 18.0,
                'fee_category_id' => 1,
                'id' => 533,
                'updated_at' => '2022-04-06 09:36:22',
            ),
            37 => 
            array (
                'assign_student_id' => 528,
                'created_at' => '2022-04-06 09:36:23',
                'discount' => 9.0,
                'fee_category_id' => 1,
                'id' => 534,
                'updated_at' => '2022-04-06 09:36:23',
            ),
            38 => 
            array (
                'assign_student_id' => 529,
                'created_at' => '2022-04-06 09:36:23',
                'discount' => 17.0,
                'fee_category_id' => 1,
                'id' => 535,
                'updated_at' => '2022-04-06 09:36:23',
            ),
            39 => 
            array (
                'assign_student_id' => 530,
                'created_at' => '2022-04-06 09:36:23',
                'discount' => 12.0,
                'fee_category_id' => 1,
                'id' => 536,
                'updated_at' => '2022-04-06 09:36:23',
            ),
            40 => 
            array (
                'assign_student_id' => 531,
                'created_at' => '2022-04-06 09:36:24',
                'discount' => 17.0,
                'fee_category_id' => 1,
                'id' => 537,
                'updated_at' => '2022-04-06 09:36:24',
            ),
            41 => 
            array (
                'assign_student_id' => 532,
                'created_at' => '2022-04-06 09:36:25',
                'discount' => 21.0,
                'fee_category_id' => 1,
                'id' => 538,
                'updated_at' => '2022-04-06 09:36:25',
            ),
            42 => 
            array (
                'assign_student_id' => 533,
                'created_at' => '2022-04-06 09:36:25',
                'discount' => 13.0,
                'fee_category_id' => 1,
                'id' => 539,
                'updated_at' => '2022-04-06 09:36:25',
            ),
            43 => 
            array (
                'assign_student_id' => 534,
                'created_at' => '2022-04-06 09:36:26',
                'discount' => 9.0,
                'fee_category_id' => 1,
                'id' => 540,
                'updated_at' => '2022-04-06 09:36:26',
            ),
            44 => 
            array (
                'assign_student_id' => 535,
                'created_at' => '2022-04-06 09:36:26',
                'discount' => 11.0,
                'fee_category_id' => 1,
                'id' => 541,
                'updated_at' => '2022-04-06 09:36:26',
            ),
            45 => 
            array (
                'assign_student_id' => 536,
                'created_at' => '2022-04-06 09:36:26',
                'discount' => 14.0,
                'fee_category_id' => 1,
                'id' => 542,
                'updated_at' => '2022-04-06 09:36:26',
            ),
            46 => 
            array (
                'assign_student_id' => 537,
                'created_at' => '2022-04-06 09:36:27',
                'discount' => 18.0,
                'fee_category_id' => 1,
                'id' => 543,
                'updated_at' => '2022-04-06 09:36:27',
            ),
            47 => 
            array (
                'assign_student_id' => 538,
                'created_at' => '2022-04-06 09:36:36',
                'discount' => 11.0,
                'fee_category_id' => 1,
                'id' => 544,
                'updated_at' => '2022-04-06 09:36:36',
            ),
            48 => 
            array (
                'assign_student_id' => 539,
                'created_at' => '2022-04-06 09:36:36',
                'discount' => 13.0,
                'fee_category_id' => 1,
                'id' => 545,
                'updated_at' => '2022-04-06 09:36:36',
            ),
            49 => 
            array (
                'assign_student_id' => 540,
                'created_at' => '2022-04-06 09:36:37',
                'discount' => 24.0,
                'fee_category_id' => 1,
                'id' => 546,
                'updated_at' => '2022-04-06 09:36:37',
            ),
            50 => 
            array (
                'assign_student_id' => 541,
                'created_at' => '2022-04-06 09:36:37',
                'discount' => 8.0,
                'fee_category_id' => 1,
                'id' => 547,
                'updated_at' => '2022-04-06 09:36:37',
            ),
            51 => 
            array (
                'assign_student_id' => 542,
                'created_at' => '2022-04-06 09:36:38',
                'discount' => 10.0,
                'fee_category_id' => 1,
                'id' => 548,
                'updated_at' => '2022-04-06 09:36:38',
            ),
            52 => 
            array (
                'assign_student_id' => 543,
                'created_at' => '2022-04-06 09:36:38',
                'discount' => 10.0,
                'fee_category_id' => 1,
                'id' => 549,
                'updated_at' => '2022-04-06 09:36:38',
            ),
            53 => 
            array (
                'assign_student_id' => 544,
                'created_at' => '2022-04-06 09:36:39',
                'discount' => 11.0,
                'fee_category_id' => 1,
                'id' => 550,
                'updated_at' => '2022-04-06 09:36:39',
            ),
            54 => 
            array (
                'assign_student_id' => 545,
                'created_at' => '2022-04-06 09:36:39',
                'discount' => 21.0,
                'fee_category_id' => 1,
                'id' => 551,
                'updated_at' => '2022-04-06 09:36:39',
            ),
            55 => 
            array (
                'assign_student_id' => 546,
                'created_at' => '2022-04-06 09:36:39',
                'discount' => 14.0,
                'fee_category_id' => 1,
                'id' => 552,
                'updated_at' => '2022-04-06 09:36:39',
            ),
            56 => 
            array (
                'assign_student_id' => 547,
                'created_at' => '2022-04-06 09:36:40',
                'discount' => 20.0,
                'fee_category_id' => 1,
                'id' => 553,
                'updated_at' => '2022-04-06 09:36:40',
            ),
            57 => 
            array (
                'assign_student_id' => 548,
                'created_at' => '2022-04-06 09:36:40',
                'discount' => 19.0,
                'fee_category_id' => 1,
                'id' => 554,
                'updated_at' => '2022-04-06 09:36:40',
            ),
            58 => 
            array (
                'assign_student_id' => 549,
                'created_at' => '2022-04-06 09:36:41',
                'discount' => 7.0,
                'fee_category_id' => 1,
                'id' => 555,
                'updated_at' => '2022-04-06 09:36:41',
            ),
            59 => 
            array (
                'assign_student_id' => 550,
                'created_at' => '2022-04-06 09:36:41',
                'discount' => 19.0,
                'fee_category_id' => 1,
                'id' => 556,
                'updated_at' => '2022-04-06 09:36:41',
            ),
            60 => 
            array (
                'assign_student_id' => 551,
                'created_at' => '2022-04-06 09:36:42',
                'discount' => 25.0,
                'fee_category_id' => 1,
                'id' => 557,
                'updated_at' => '2022-04-06 09:36:42',
            ),
            61 => 
            array (
                'assign_student_id' => 552,
                'created_at' => '2022-04-06 09:36:42',
                'discount' => 24.0,
                'fee_category_id' => 1,
                'id' => 558,
                'updated_at' => '2022-04-06 09:36:42',
            ),
            62 => 
            array (
                'assign_student_id' => 553,
                'created_at' => '2022-04-06 09:36:43',
                'discount' => 10.0,
                'fee_category_id' => 1,
                'id' => 559,
                'updated_at' => '2022-04-06 09:36:43',
            ),
            63 => 
            array (
                'assign_student_id' => 554,
                'created_at' => '2022-04-06 09:36:43',
                'discount' => 24.0,
                'fee_category_id' => 1,
                'id' => 560,
                'updated_at' => '2022-04-06 09:36:43',
            ),
            64 => 
            array (
                'assign_student_id' => 555,
                'created_at' => '2022-04-06 09:36:44',
                'discount' => 19.0,
                'fee_category_id' => 1,
                'id' => 561,
                'updated_at' => '2022-04-06 09:36:44',
            ),
            65 => 
            array (
                'assign_student_id' => 556,
                'created_at' => '2022-04-06 09:36:44',
                'discount' => 9.0,
                'fee_category_id' => 1,
                'id' => 562,
                'updated_at' => '2022-04-06 09:36:44',
            ),
            66 => 
            array (
                'assign_student_id' => 557,
                'created_at' => '2022-04-06 09:36:44',
                'discount' => 25.0,
                'fee_category_id' => 1,
                'id' => 563,
                'updated_at' => '2022-04-06 09:36:44',
            ),
            67 => 
            array (
                'assign_student_id' => 558,
                'created_at' => '2022-04-06 09:36:45',
                'discount' => 12.0,
                'fee_category_id' => 1,
                'id' => 564,
                'updated_at' => '2022-04-06 09:36:45',
            ),
            68 => 
            array (
                'assign_student_id' => 559,
                'created_at' => '2022-04-06 09:36:45',
                'discount' => 16.0,
                'fee_category_id' => 1,
                'id' => 565,
                'updated_at' => '2022-04-06 09:36:45',
            ),
            69 => 
            array (
                'assign_student_id' => 560,
                'created_at' => '2022-04-06 09:36:46',
                'discount' => 11.0,
                'fee_category_id' => 1,
                'id' => 566,
                'updated_at' => '2022-04-06 09:36:46',
            ),
            70 => 
            array (
                'assign_student_id' => 561,
                'created_at' => '2022-04-06 09:36:46',
                'discount' => 15.0,
                'fee_category_id' => 1,
                'id' => 567,
                'updated_at' => '2022-04-06 09:36:46',
            ),
            71 => 
            array (
                'assign_student_id' => 562,
                'created_at' => '2022-04-06 09:36:47',
                'discount' => 23.0,
                'fee_category_id' => 1,
                'id' => 568,
                'updated_at' => '2022-04-06 09:36:47',
            ),
            72 => 
            array (
                'assign_student_id' => 563,
                'created_at' => '2022-04-06 09:36:47',
                'discount' => 20.0,
                'fee_category_id' => 1,
                'id' => 569,
                'updated_at' => '2022-04-06 09:36:47',
            ),
            73 => 
            array (
                'assign_student_id' => 564,
                'created_at' => '2022-04-06 09:36:47',
                'discount' => 19.0,
                'fee_category_id' => 1,
                'id' => 570,
                'updated_at' => '2022-04-06 09:36:47',
            ),
            74 => 
            array (
                'assign_student_id' => 565,
                'created_at' => '2022-04-06 09:36:48',
                'discount' => 10.0,
                'fee_category_id' => 1,
                'id' => 571,
                'updated_at' => '2022-04-06 09:36:48',
            ),
            75 => 
            array (
                'assign_student_id' => 566,
                'created_at' => '2022-04-06 09:36:48',
                'discount' => 22.0,
                'fee_category_id' => 1,
                'id' => 572,
                'updated_at' => '2022-04-06 09:36:48',
            ),
            76 => 
            array (
                'assign_student_id' => 567,
                'created_at' => '2022-04-06 09:36:49',
                'discount' => 12.0,
                'fee_category_id' => 1,
                'id' => 573,
                'updated_at' => '2022-04-06 09:36:49',
            ),
            77 => 
            array (
                'assign_student_id' => 568,
                'created_at' => '2022-04-06 09:36:49',
                'discount' => 21.0,
                'fee_category_id' => 1,
                'id' => 574,
                'updated_at' => '2022-04-06 09:36:49',
            ),
            78 => 
            array (
                'assign_student_id' => 569,
                'created_at' => '2022-04-06 09:36:50',
                'discount' => 11.0,
                'fee_category_id' => 1,
                'id' => 575,
                'updated_at' => '2022-04-06 09:36:50',
            ),
            79 => 
            array (
                'assign_student_id' => 570,
                'created_at' => '2022-04-06 09:36:50',
                'discount' => 16.0,
                'fee_category_id' => 1,
                'id' => 576,
                'updated_at' => '2022-04-06 09:36:50',
            ),
            80 => 
            array (
                'assign_student_id' => 571,
                'created_at' => '2022-04-06 09:36:50',
                'discount' => 6.0,
                'fee_category_id' => 1,
                'id' => 577,
                'updated_at' => '2022-04-06 09:36:50',
            ),
            81 => 
            array (
                'assign_student_id' => 572,
                'created_at' => '2022-04-06 09:36:55',
                'discount' => 17.0,
                'fee_category_id' => 1,
                'id' => 578,
                'updated_at' => '2022-04-06 09:36:55',
            ),
            82 => 
            array (
                'assign_student_id' => 573,
                'created_at' => '2022-04-06 09:36:55',
                'discount' => 24.0,
                'fee_category_id' => 1,
                'id' => 579,
                'updated_at' => '2022-04-06 09:36:55',
            ),
            83 => 
            array (
                'assign_student_id' => 574,
                'created_at' => '2022-04-06 09:36:56',
                'discount' => 10.0,
                'fee_category_id' => 1,
                'id' => 580,
                'updated_at' => '2022-04-06 09:36:56',
            ),
            84 => 
            array (
                'assign_student_id' => 575,
                'created_at' => '2022-04-06 09:36:56',
                'discount' => 15.0,
                'fee_category_id' => 1,
                'id' => 581,
                'updated_at' => '2022-04-06 09:36:56',
            ),
            85 => 
            array (
                'assign_student_id' => 576,
                'created_at' => '2022-04-06 09:36:57',
                'discount' => 5.0,
                'fee_category_id' => 1,
                'id' => 582,
                'updated_at' => '2022-04-06 09:36:57',
            ),
            86 => 
            array (
                'assign_student_id' => 577,
                'created_at' => '2022-04-06 09:36:57',
                'discount' => 15.0,
                'fee_category_id' => 1,
                'id' => 583,
                'updated_at' => '2022-04-06 09:36:57',
            ),
            87 => 
            array (
                'assign_student_id' => 578,
                'created_at' => '2022-04-06 09:36:58',
                'discount' => 23.0,
                'fee_category_id' => 1,
                'id' => 584,
                'updated_at' => '2022-04-06 09:36:58',
            ),
            88 => 
            array (
                'assign_student_id' => 579,
                'created_at' => '2022-04-06 09:36:58',
                'discount' => 13.0,
                'fee_category_id' => 1,
                'id' => 585,
                'updated_at' => '2022-04-06 09:36:58',
            ),
            89 => 
            array (
                'assign_student_id' => 580,
                'created_at' => '2022-04-06 09:37:07',
                'discount' => 8.0,
                'fee_category_id' => 1,
                'id' => 586,
                'updated_at' => '2022-04-06 09:37:07',
            ),
            90 => 
            array (
                'assign_student_id' => 581,
                'created_at' => '2022-04-06 09:37:08',
                'discount' => 11.0,
                'fee_category_id' => 1,
                'id' => 587,
                'updated_at' => '2022-04-06 09:37:08',
            ),
            91 => 
            array (
                'assign_student_id' => 582,
                'created_at' => '2022-04-06 09:37:09',
                'discount' => 23.0,
                'fee_category_id' => 1,
                'id' => 588,
                'updated_at' => '2022-04-06 09:37:09',
            ),
            92 => 
            array (
                'assign_student_id' => 583,
                'created_at' => '2022-04-06 09:37:10',
                'discount' => 14.0,
                'fee_category_id' => 1,
                'id' => 589,
                'updated_at' => '2022-04-06 09:37:10',
            ),
            93 => 
            array (
                'assign_student_id' => 584,
                'created_at' => '2022-04-06 09:37:11',
                'discount' => 12.0,
                'fee_category_id' => 1,
                'id' => 590,
                'updated_at' => '2022-04-06 09:37:11',
            ),
            94 => 
            array (
                'assign_student_id' => 585,
                'created_at' => '2022-04-06 09:37:11',
                'discount' => 14.0,
                'fee_category_id' => 1,
                'id' => 591,
                'updated_at' => '2022-04-06 09:37:11',
            ),
            95 => 
            array (
                'assign_student_id' => 586,
                'created_at' => '2022-04-06 09:37:11',
                'discount' => 20.0,
                'fee_category_id' => 1,
                'id' => 592,
                'updated_at' => '2022-04-06 09:37:11',
            ),
            96 => 
            array (
                'assign_student_id' => 587,
                'created_at' => '2022-04-06 09:37:12',
                'discount' => 21.0,
                'fee_category_id' => 1,
                'id' => 593,
                'updated_at' => '2022-04-06 09:37:12',
            ),
            97 => 
            array (
                'assign_student_id' => 588,
                'created_at' => '2022-04-06 09:37:12',
                'discount' => 19.0,
                'fee_category_id' => 1,
                'id' => 594,
                'updated_at' => '2022-04-06 09:37:12',
            ),
            98 => 
            array (
                'assign_student_id' => 589,
                'created_at' => '2022-04-06 09:37:13',
                'discount' => 5.0,
                'fee_category_id' => 1,
                'id' => 595,
                'updated_at' => '2022-04-06 09:37:13',
            ),
            99 => 
            array (
                'assign_student_id' => 590,
                'created_at' => '2022-04-06 09:37:13',
                'discount' => 23.0,
                'fee_category_id' => 1,
                'id' => 596,
                'updated_at' => '2022-04-06 09:37:13',
            ),
            100 => 
            array (
                'assign_student_id' => 591,
                'created_at' => '2022-04-06 09:37:14',
                'discount' => 17.0,
                'fee_category_id' => 1,
                'id' => 597,
                'updated_at' => '2022-04-06 09:37:14',
            ),
            101 => 
            array (
                'assign_student_id' => 592,
                'created_at' => '2022-04-06 09:37:14',
                'discount' => 14.0,
                'fee_category_id' => 1,
                'id' => 598,
                'updated_at' => '2022-04-06 09:37:14',
            ),
            102 => 
            array (
                'assign_student_id' => 593,
                'created_at' => '2022-04-06 09:37:15',
                'discount' => 13.0,
                'fee_category_id' => 1,
                'id' => 599,
                'updated_at' => '2022-04-06 09:37:15',
            ),
            103 => 
            array (
                'assign_student_id' => 594,
                'created_at' => '2022-04-06 09:37:15',
                'discount' => 23.0,
                'fee_category_id' => 1,
                'id' => 600,
                'updated_at' => '2022-04-06 09:37:15',
            ),
            104 => 
            array (
                'assign_student_id' => 595,
                'created_at' => '2022-04-06 09:37:15',
                'discount' => 25.0,
                'fee_category_id' => 1,
                'id' => 601,
                'updated_at' => '2022-04-06 09:37:15',
            ),
            105 => 
            array (
                'assign_student_id' => 596,
                'created_at' => '2022-04-06 09:37:16',
                'discount' => 8.0,
                'fee_category_id' => 1,
                'id' => 602,
                'updated_at' => '2022-04-06 09:37:16',
            ),
            106 => 
            array (
                'assign_student_id' => 597,
                'created_at' => '2022-04-06 09:37:16',
                'discount' => 8.0,
                'fee_category_id' => 1,
                'id' => 603,
                'updated_at' => '2022-04-06 09:37:16',
            ),
            107 => 
            array (
                'assign_student_id' => 598,
                'created_at' => '2022-04-06 09:37:17',
                'discount' => 9.0,
                'fee_category_id' => 1,
                'id' => 604,
                'updated_at' => '2022-04-06 09:37:17',
            ),
            108 => 
            array (
                'assign_student_id' => 599,
                'created_at' => '2022-04-06 09:37:17',
                'discount' => 23.0,
                'fee_category_id' => 1,
                'id' => 605,
                'updated_at' => '2022-04-06 09:37:17',
            ),
            109 => 
            array (
                'assign_student_id' => 600,
                'created_at' => '2022-04-06 09:37:18',
                'discount' => 19.0,
                'fee_category_id' => 1,
                'id' => 606,
                'updated_at' => '2022-04-06 09:37:18',
            ),
            110 => 
            array (
                'assign_student_id' => 601,
                'created_at' => '2022-04-06 09:37:18',
                'discount' => 14.0,
                'fee_category_id' => 1,
                'id' => 607,
                'updated_at' => '2022-04-06 09:37:18',
            ),
            111 => 
            array (
                'assign_student_id' => 602,
                'created_at' => '2022-04-06 09:37:18',
                'discount' => 18.0,
                'fee_category_id' => 1,
                'id' => 608,
                'updated_at' => '2022-04-06 09:37:18',
            ),
            112 => 
            array (
                'assign_student_id' => 603,
                'created_at' => '2022-04-06 09:37:19',
                'discount' => 6.0,
                'fee_category_id' => 1,
                'id' => 609,
                'updated_at' => '2022-04-06 09:37:19',
            ),
            113 => 
            array (
                'assign_student_id' => 604,
                'created_at' => '2022-04-06 09:37:19',
                'discount' => 11.0,
                'fee_category_id' => 1,
                'id' => 610,
                'updated_at' => '2022-04-06 09:37:19',
            ),
            114 => 
            array (
                'assign_student_id' => 605,
                'created_at' => '2022-04-06 09:37:20',
                'discount' => 20.0,
                'fee_category_id' => 1,
                'id' => 611,
                'updated_at' => '2022-04-06 09:37:20',
            ),
            115 => 
            array (
                'assign_student_id' => 606,
                'created_at' => '2022-04-06 09:37:20',
                'discount' => 13.0,
                'fee_category_id' => 1,
                'id' => 612,
                'updated_at' => '2022-04-06 09:37:20',
            ),
            116 => 
            array (
                'assign_student_id' => 607,
                'created_at' => '2022-04-06 09:37:21',
                'discount' => 9.0,
                'fee_category_id' => 1,
                'id' => 613,
                'updated_at' => '2022-04-06 09:37:21',
            ),
            117 => 
            array (
                'assign_student_id' => 608,
                'created_at' => '2022-04-06 09:37:22',
                'discount' => 20.0,
                'fee_category_id' => 1,
                'id' => 614,
                'updated_at' => '2022-04-06 09:37:22',
            ),
            118 => 
            array (
                'assign_student_id' => 609,
                'created_at' => '2022-04-06 09:37:22',
                'discount' => 25.0,
                'fee_category_id' => 1,
                'id' => 615,
                'updated_at' => '2022-04-06 09:37:22',
            ),
            119 => 
            array (
                'assign_student_id' => 610,
                'created_at' => '2022-04-06 09:37:23',
                'discount' => 11.0,
                'fee_category_id' => 1,
                'id' => 616,
                'updated_at' => '2022-04-06 09:37:23',
            ),
            120 => 
            array (
                'assign_student_id' => 611,
                'created_at' => '2022-04-06 09:37:23',
                'discount' => 9.0,
                'fee_category_id' => 1,
                'id' => 617,
                'updated_at' => '2022-04-06 09:37:23',
            ),
            121 => 
            array (
                'assign_student_id' => 612,
                'created_at' => '2022-04-06 09:37:24',
                'discount' => 21.0,
                'fee_category_id' => 1,
                'id' => 618,
                'updated_at' => '2022-04-06 09:37:24',
            ),
            122 => 
            array (
                'assign_student_id' => 613,
                'created_at' => '2022-04-06 09:37:24',
                'discount' => 19.0,
                'fee_category_id' => 1,
                'id' => 619,
                'updated_at' => '2022-04-06 09:37:24',
            ),
            123 => 
            array (
                'assign_student_id' => 614,
                'created_at' => '2022-04-06 09:37:25',
                'discount' => 24.0,
                'fee_category_id' => 1,
                'id' => 620,
                'updated_at' => '2022-04-06 09:37:25',
            ),
            124 => 
            array (
                'assign_student_id' => 615,
                'created_at' => '2022-04-06 09:37:25',
                'discount' => 18.0,
                'fee_category_id' => 1,
                'id' => 621,
                'updated_at' => '2022-04-06 09:37:25',
            ),
            125 => 
            array (
                'assign_student_id' => 616,
                'created_at' => '2022-04-06 09:37:26',
                'discount' => 7.0,
                'fee_category_id' => 1,
                'id' => 622,
                'updated_at' => '2022-04-06 09:37:26',
            ),
            126 => 
            array (
                'assign_student_id' => 617,
                'created_at' => '2022-04-06 09:37:26',
                'discount' => 19.0,
                'fee_category_id' => 1,
                'id' => 623,
                'updated_at' => '2022-04-06 09:37:26',
            ),
            127 => 
            array (
                'assign_student_id' => 618,
                'created_at' => '2022-04-06 09:37:27',
                'discount' => 12.0,
                'fee_category_id' => 1,
                'id' => 624,
                'updated_at' => '2022-04-06 09:37:27',
            ),
            128 => 
            array (
                'assign_student_id' => 619,
                'created_at' => '2022-04-06 09:37:29',
                'discount' => 14.0,
                'fee_category_id' => 1,
                'id' => 625,
                'updated_at' => '2022-04-06 09:37:29',
            ),
            129 => 
            array (
                'assign_student_id' => 620,
                'created_at' => '2022-04-06 09:37:30',
                'discount' => 15.0,
                'fee_category_id' => 1,
                'id' => 626,
                'updated_at' => '2022-04-06 09:37:30',
            ),
            130 => 
            array (
                'assign_student_id' => 621,
                'created_at' => '2022-04-06 09:37:30',
                'discount' => 10.0,
                'fee_category_id' => 1,
                'id' => 627,
                'updated_at' => '2022-04-06 09:37:30',
            ),
            131 => 
            array (
                'assign_student_id' => 622,
                'created_at' => '2022-04-06 09:37:30',
                'discount' => 12.0,
                'fee_category_id' => 1,
                'id' => 628,
                'updated_at' => '2022-04-06 09:37:30',
            ),
            132 => 
            array (
                'assign_student_id' => 623,
                'created_at' => '2022-04-06 09:37:31',
                'discount' => 8.0,
                'fee_category_id' => 1,
                'id' => 629,
                'updated_at' => '2022-04-06 09:37:31',
            ),
            133 => 
            array (
                'assign_student_id' => 624,
                'created_at' => '2022-04-06 09:37:31',
                'discount' => 17.0,
                'fee_category_id' => 1,
                'id' => 630,
                'updated_at' => '2022-04-06 09:37:31',
            ),
            134 => 
            array (
                'assign_student_id' => 625,
                'created_at' => '2022-04-06 09:37:32',
                'discount' => 15.0,
                'fee_category_id' => 1,
                'id' => 631,
                'updated_at' => '2022-04-06 09:37:32',
            ),
            135 => 
            array (
                'assign_student_id' => 626,
                'created_at' => '2022-04-06 09:37:32',
                'discount' => 13.0,
                'fee_category_id' => 1,
                'id' => 632,
                'updated_at' => '2022-04-06 09:37:32',
            ),
            136 => 
            array (
                'assign_student_id' => 627,
                'created_at' => '2022-04-06 09:37:33',
                'discount' => 11.0,
                'fee_category_id' => 1,
                'id' => 633,
                'updated_at' => '2022-04-06 09:37:33',
            ),
            137 => 
            array (
                'assign_student_id' => 628,
                'created_at' => '2022-04-06 09:37:33',
                'discount' => 6.0,
                'fee_category_id' => 1,
                'id' => 634,
                'updated_at' => '2022-04-06 09:37:33',
            ),
            138 => 
            array (
                'assign_student_id' => 629,
                'created_at' => '2022-04-06 09:37:33',
                'discount' => 10.0,
                'fee_category_id' => 1,
                'id' => 635,
                'updated_at' => '2022-04-06 09:37:33',
            ),
            139 => 
            array (
                'assign_student_id' => 630,
                'created_at' => '2022-04-06 09:37:34',
                'discount' => 17.0,
                'fee_category_id' => 1,
                'id' => 636,
                'updated_at' => '2022-04-06 09:37:34',
            ),
            140 => 
            array (
                'assign_student_id' => 631,
                'created_at' => '2022-04-06 09:37:34',
                'discount' => 14.0,
                'fee_category_id' => 1,
                'id' => 637,
                'updated_at' => '2022-04-06 09:37:34',
            ),
            141 => 
            array (
                'assign_student_id' => 632,
                'created_at' => '2022-04-06 09:37:35',
                'discount' => 24.0,
                'fee_category_id' => 1,
                'id' => 638,
                'updated_at' => '2022-04-06 09:37:35',
            ),
            142 => 
            array (
                'assign_student_id' => 633,
                'created_at' => '2022-04-06 09:37:35',
                'discount' => 5.0,
                'fee_category_id' => 1,
                'id' => 639,
                'updated_at' => '2022-04-06 09:37:35',
            ),
            143 => 
            array (
                'assign_student_id' => 634,
                'created_at' => '2022-04-06 09:37:36',
                'discount' => 11.0,
                'fee_category_id' => 1,
                'id' => 640,
                'updated_at' => '2022-04-06 09:37:36',
            ),
            144 => 
            array (
                'assign_student_id' => 635,
                'created_at' => '2022-04-06 09:37:36',
                'discount' => 25.0,
                'fee_category_id' => 1,
                'id' => 641,
                'updated_at' => '2022-04-06 09:37:36',
            ),
            145 => 
            array (
                'assign_student_id' => 636,
                'created_at' => '2022-04-06 09:37:36',
                'discount' => 14.0,
                'fee_category_id' => 1,
                'id' => 642,
                'updated_at' => '2022-04-06 09:37:36',
            ),
            146 => 
            array (
                'assign_student_id' => 637,
                'created_at' => '2022-04-06 09:37:37',
                'discount' => 16.0,
                'fee_category_id' => 1,
                'id' => 643,
                'updated_at' => '2022-04-06 09:37:37',
            ),
            147 => 
            array (
                'assign_student_id' => 638,
                'created_at' => '2022-04-06 09:37:37',
                'discount' => 7.0,
                'fee_category_id' => 1,
                'id' => 644,
                'updated_at' => '2022-04-06 09:37:37',
            ),
            148 => 
            array (
                'assign_student_id' => 639,
                'created_at' => '2022-04-06 09:37:38',
                'discount' => 20.0,
                'fee_category_id' => 1,
                'id' => 645,
                'updated_at' => '2022-04-06 09:37:38',
            ),
            149 => 
            array (
                'assign_student_id' => 640,
                'created_at' => '2022-04-06 09:37:38',
                'discount' => 25.0,
                'fee_category_id' => 1,
                'id' => 646,
                'updated_at' => '2022-04-06 09:37:38',
            ),
            150 => 
            array (
                'assign_student_id' => 641,
                'created_at' => '2022-04-06 09:37:39',
                'discount' => 14.0,
                'fee_category_id' => 1,
                'id' => 647,
                'updated_at' => '2022-04-06 09:37:39',
            ),
        ));
        
        
    }
}