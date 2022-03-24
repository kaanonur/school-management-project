<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{

    public function index()
    {
        $data['allData'] = StudentGroup::all();

        return view('backend.setup.student_group.view_group', compact('data'));
    }


    public function create()
    {
        return view('backend.setup.student_group.add_group');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_groups,name'
        ]);

        StudentGroup::create(['name' => $request->name]);

        $notification = [];
        $notification['message'] = 'Student Group Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('student.group.view')->with($notification);
    }

    public function edit(StudentGroup $studentGroup)
    {
        return view('backend.setup.student_group.edit_group', compact('studentGroup'));
    }


    public function update(Request $request, StudentGroup $studentGroup)
    {
        $request->validate([
            'name' => 'required|unique:student_groups,name,'.$studentGroup->id
        ]);
        $studentGroup->name = $request->name;
        $studentGroup->save();

        $notification = [];
        $notification['message'] = 'Student Group Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('student.group.view')->with($notification);
    }

    public function destroy(StudentGroup $studentGroup)
    {
        $studentGroup->delete();

        $notification = [];
        $notification['message'] = 'Student Group Deleted Succesfully';
        $notification['alert_type'] = 'success';

        return back()->with($notification);
    }
}
