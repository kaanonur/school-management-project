<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function index()
    {
        $data['allData'] = StudentShift::all();

        return view('backend.setup.student_shift.view_shift', compact('data'));
    }


    public function create()
    {
        return view('backend.setup.student_shift.add_shift');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_shifts,name'
        ]);

        StudentShift::create(['name' => $request->name]);

        $notification = [];
        $notification['message'] = 'Student Shift Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function edit(StudentShift $studentShift)
    {
        return view('backend.setup.student_shift.edit_shift', compact('studentShift'));
    }


    public function update(Request $request, StudentShift $studentShift)
    {
        $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$studentShift->id
        ]);
        $studentShift->name = $request->name;
        $studentShift->save();

        $notification = [];
        $notification['message'] = 'Student Shift Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function destroy(StudentShift $studentShift)
    {
        $studentShift->delete();

        $notification = [];
        $notification['message'] = 'Student Shift Deleted Succesfully';
        $notification['alert_type'] = 'success';

        return back()->with($notification);
    }
}
