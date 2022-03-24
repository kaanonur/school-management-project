<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function index()
    {
        $data['allData'] = StudentYear::all();

        return view('backend.setup.student_year.view_year', compact('data'));
    }

    public function create()
    {
        return view('backend.setup.student_year.add_year');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_years,name|numeric|digits:4|min:2000'
        ]);

        StudentYear::create(['name' => $request->name]);

        $notification = [];
        $notification['message'] = 'Student Year Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('student.year.view')->with($notification);
    }

    public function edit(StudentYear $studentYear)
    {
        return view('backend.setup.student_year.edit_year', compact('studentYear'));
    }

    public function update(Request $request, StudentYear $studentYear)
    {
        $request->validate([
            'name' => 'required|unique:student_years,name,'.$studentYear->id.'|numeric|digits:4|min:2000'
        ]);
        $studentYear->name = $request->name;
        $studentYear->save();

        $notification = [];
        $notification['message'] = 'Student Year Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('student.year.view')->with($notification);
    }

    public function destroy(StudentYear $studentYear)
    {
        $studentYear->delete();

        $notification = [];
        $notification['message'] = 'Student Year Deleted Succesfully';
        $notification['alert_type'] = 'success';

        return back()->with($notification);
    }
}
