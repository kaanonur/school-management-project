<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRollController extends Controller
{
    public function index()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('backend.student.roll_generate.view', compact('data'));
    }

    public function store(Request $request)
    {
        $yearId = $request->year_id;
        $classId = $request->class_id;
        if ($request->student_id != null) {
            for ($i=0; $i < count($request->student_id); $i++) {
                AssignStudent::where(['year_id' => $yearId, 'class_id' => $classId, 'student_id' => $request->student_id[$i]])
                    ->update(['roll' => $request->roll[$i]]);
            }
        } else {
            $notification = [];
            $notification['message'] = 'Sorry there are no student';
            $notification['alert_type'] = 'error';

            return redirect()->back()->with($notification);
        }

        $notification = [];
        $notification['message'] = 'Roll Generated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->back()->with($notification);
    }

    public function getStudents(Request $request)
    {
        $allData = AssignStudent::with(['student'])->where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();

        return response()->json($allData);
    }
}
