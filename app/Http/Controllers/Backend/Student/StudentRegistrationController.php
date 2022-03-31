<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRegistration\StoreRequest;
use App\Http\Requests\StudentRegistration\UpdateRequest;
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
use PDF;

class StudentRegistrationController extends Controller
{
    public function index()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = StudentYear::orderBy('id', 'desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id', 'desc')->first()->id;
        $data['allData'] = AssignStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();

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

    public function store(StoreRequest $request)
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

            $discountStudent = new DiscountStudent();
            $discountStudent->assign_student_id = $assignStudent->id;
            $discountStudent->fee_category_id = 1;
            $discountStudent->discount = $request->discount;
            $discountStudent->save();
        });

        $notification = [];
        $notification['message'] = 'Student Registration Inserted Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('student.registration.view')->with($notification);
    }

    public function show(AssignStudent $assignStudent)
    {
        $data['detail'] = AssignStudent::where('id', $assignStudent->id)->with(['student', 'discount'])->first();

        $this->generate_pdf($data);
    }

    public function edit(AssignStudent $assignStudent)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        $data['editData'] = AssignStudent::where('id', $assignStudent->id)->with(['student', 'discount'])->first();

        return view('backend.student.student_registration.edit', compact('data', 'assignStudent'));
    }

    public function update(UpdateRequest $request, AssignStudent $assignStudent)
    {
        DB::transaction(function () use($request, $assignStudent){
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'Student')->orderBy('id', 'desc')->first();




            $user = User::where('id', $assignStudent->student_id)->first();

            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/'. $user->image));
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $fileName);
                $user->image = $fileName;
            }
            $user->save();

            $assignStudent->year_id = $request->year_id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();

            $discountStudent = DiscountStudent::where('assign_student_id', $assignStudent->student_id)->first();
            $discountStudent->discount = $request->discount;
            $discountStudent->save();
        });

        $notification = [];
        $notification['message'] = 'Student Registration Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('student.registration.view')->with($notification);
    }

    public function destroy(AssignStudent $assignStudent)
    {
        DB::transaction(function () use($assignStudent){

            $user = User::where('id', $assignStudent->student_id)->first();
            if ($user->image != null) {
                @unlink(public_path('upload/student_images/'. $user->image));
            }
            $user->delete();
            $discountStudent = DiscountStudent::where('assign_student_id', $assignStudent->student_id)->first();
            $discountStudent->delete();

            $assignStudent->delete();
        });

        $notification = [];
        $notification['message'] = 'Student Registration Deleted Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('student.registration.view')->with($notification);
    }

    public function search(Request $request)
    {
        $request->validate([
            'year_id' => 'required',
            'class_id' => 'required'
        ]);
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;

        $data['allData'] = AssignStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();

        return view('backend.student.student_registration.view', compact('data'));
    }

    function generate_pdf($data) {
        $pdf = PDF::loadView('backend.student.student_registration.details_pdf', compact('data'));
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
