<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentRegistrationController extends Controller
{
    public function index()
    {
        $data['allData'] = AssignStudent::all();
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('backend.student.student_registration.view', compact('data'));
    }

    public function create()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        return view('backend.student.student_registration.create', compact('data'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use($request){
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'Student')->orderBy('id', 'desc')->first();

            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg+1;

                if ($studentId < 10) {
                    $idNo = '000'.$studentId;
                } elseif($studentId < 100) {
                    $idNo = '00'.$studentId;
                } elseif($studentId < 1000) {
                    $idNo = '0'.$studentId;
                }
            } else {
                $studentId = $student->id+1;
                if ($studentId < 10) {
                    $idNo = '000'.$studentId;
                } elseif($studentId < 100) {
                    $idNo = '00'.$studentId;
                } elseif($studentId < 1000) {
                    $idNo = '0'.$studentId;
                }
            }

            $finalIdNo = $checkYear.$idNo;
            $code = rand(0000,9999);

            $user = new User();
            $user->id_no = $finalIdNo;
            $user->password = Hash::make($code);
            $user->code = $code;
            $user->usertype = 'Student';
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            if ($request->file('image')) {
                $file = $request->file('image');
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $fileName);
                $user->image = $fileName;
            }
            $user->save();

            $assignStudent = new AssignStudent();
            $assignStudent->student_id = $user->id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();

            if ($request->discount != '') {
                $discountStudent = new DiscountStudent();
                $discountStudent->assign_student_id = $assignStudent->id;
                $discountStudent->fee_category_id = 1;
                $discountStudent->discount = $request->discount;
                $discountStudent->save();
            }
        });

        $notification = [];
        $notification['message'] = 'Student Registration Inserted Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('student.registration.view')->with($notification);
    }
}
