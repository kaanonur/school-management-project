<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class StudentRegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $code = rand(0000,9999);
        return [
            'id_no' => $this->faker->unique()->randomNumber(5),
            'password' => Hash::make($code),
            'code' => $code,
            'usertype' => 'Student',
            'name' => $this->faker->name
        ];
    }
}
