<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function index()
    {
        $data['allData'] = StudentClass::all();

        return view('backend.setup.student_class.view_class', compact('data'));
    }

    public function create()
    {
        return view('backend.setup.student_class.add_class');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|unique:student_classes,name'
        ]);

        StudentClass::create(['name' => $request->name]);

        $notification = [];
        $notification['message'] = 'Student Class Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('student_class.class.view')->with($notification);
    }

    public function edit(StudentClass $studentClass)
    {
        return view('backend.setup.student_class.edit_class', compact('studentClass'));
    }

    public function update(Request $request, StudentClass $studentClass)
    {
        $request->validate([
            'name' => 'required|unique:student_classes,name,'.$studentClass->id
        ]);
        $studentClass->name = $request->name;
        $studentClass->save();

        $notification = [];
        $notification['message'] = 'Student Class Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('student_class.class.view')->with($notification);
    }

    public function destroy(StudentClass $studentClass)
    {
        $studentClass->delete();

        $notification = [];
        $notification['message'] = 'Student Class Deleted Succesfully';
        $notification['alert_type'] = 'success';

        return back()->with($notification);
    }
}
