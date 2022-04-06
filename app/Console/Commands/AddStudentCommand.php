<?php

namespace App\Console\Commands;

use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Console\Command;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class AddStudentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:students';

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
        $years = StudentYear::select('id')->get()->toArray();
        $yearsArray = [];
        foreach ($years as $year) {
            array_push($yearsArray,$year['id']);
        }

        $classes = StudentClass::select('id')->get()->toArray();
        $classesArray = [];
        foreach ($classes as $class) {
            array_push($classesArray,$class['id']);
        }

        $groups = StudentGroup::select('id')->get()->toArray();
        $groupsArray = [];
        foreach ($groups as $group) {
            array_push($groupsArray,$group['id']);
        }

        $shifts = StudentShift::select('id')->get()->toArray();
        $shiftsArray = [];
        foreach ($shifts as $shift) {
            array_push($shiftsArray,$shift['id']);
        }


        for ($i = 0; $i < 150; $i++) {
            $gender = $faker->randomElement(['Male', 'Female']);
            $code = rand(0000,9999);

            $user = new User();
            $user->id_no = $faker->unique()->randomNumber(5);
            $user->password = Hash::make($code);
            $user->code = $code;
            $user->usertype = 'Student';
            $user->name = $faker->name($gender);
            $user->email = $faker->unique()->email;
            $user->mobile = $faker->phoneNumber;
            $user->address = $faker->address;
            $user->gender = $gender;
            $user->father_name = $faker->firstNameFemale;
            $user->mother_name = $faker->firstNameFemale;
            $user->dob = $faker->date();
            $user->join_date = $faker->dateTimeBetween('-5 years', '-1 week');
            $user->image = $faker->image('public/upload/student_images',480,640, 'profile', false);
            $user->save();

            $assignStudent = new AssignStudent();
            $assignStudent->student_id = $user->id;
            $assignStudent->year_id = $faker->randomElement($yearsArray);
            $assignStudent->class_id = $faker->randomElement($classesArray);
            $assignStudent->group_id = $faker->randomElement($groupsArray);
            $assignStudent->shift_id = $faker->randomElement($shiftsArray);
            $assignStudent->save();

            $discountStudent = new DiscountStudent();
            $discountStudent->assign_student_id = $assignStudent->id;
            $discountStudent->fee_category_id = 1;
            $discountStudent->discount = $faker->numberBetween(5,25);
            $discountStudent->save();
        }
    }
}
