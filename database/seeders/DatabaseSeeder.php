<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'usertype' => 'Admin',
            'name' => 'Kaan',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(123456),
            'remember_token' => Str::random(10),
            'mobile' => '+905555555555',
            'address' => 'test address',
            'gender' => 'Male',
            'role' => 'admin',
            'status' => 1,
        ]);
        User::factory(10)->create();
        $this->call(StudentClassesTableSeeder::class);
        $this->call(StudentYearsTableSeeder::class);
        $this->call(StudentGroupsTableSeeder::class);
        $this->call(StudentShiftsTableSeeder::class);
        $this->call(FeeCategoriesTableSeeder::class);
        $this->call(DesignationsTableSeeder::class);
        $this->call(FeeCategoryAmountsTableSeeder::class);
        $this->call(ExamTypesTableSeeder::class);
    }
}
