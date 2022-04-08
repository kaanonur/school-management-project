<?php

namespace App\Console\Commands;

use App\Models\EmployeeSalaryLog;
use App\Models\User;
use Illuminate\Console\Command;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use function Livewire\str;

class AddEmployeeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:employee';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $gender = $faker->randomElement(['Male', 'Female']);
            $code = rand(0000,9999);

            $user = new User();
            $user->id_no = $faker->unique()->randomNumber(5);
            $user->password = Hash::make($code);
            $user->code = $code;
            $user->usertype = 'Employee';
            $user->name = $faker->name($gender);
            $user->email = $faker->unique()->email;
            $user->mobile = $faker->phoneNumber;
            $user->address = $faker->address;
            $user->gender = $gender;
            $user->father_name = $faker->firstNameFemale;
            $user->mother_name = $faker->firstNameFemale;
            $user->designation_id = $faker->randomElement([2,3,4]);
            $user->dob = $faker->date();
            $user->salary = $faker->numberBetween(1200,5000);
            $user->join_date = $faker->date();
            $user->image = $faker->image('public/upload/employee_images',480,640, 'profile', false);
            $user->save();

            $assignStudent = new EmployeeSalaryLog();
            $assignStudent->employee_id = $user->id;
            $assignStudent->effected_salary = $user->join_date;
            $assignStudent->previous_salary = $user->salary;
            $assignStudent->present_salary = $user->salary;
            $assignStudent->increment_salary = 0;
            $assignStudent->save();
        }
    }
}
