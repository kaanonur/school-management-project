<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function index()
    {
        $data['allData'] = SchoolSubject::all();

        return view('backend.setup.school_subject.view_school_subject', compact('data'));
    }

    public function create()
    {
        return view('backend.setup.school_subject.add_school_subject');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:school_subjects,name'
        ]);

        SchoolSubject::create(['name' => $request->name]);

        $notification = [];
        $notification['message'] = 'Subject Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('school.subject.view')->with($notification);
    }

    public function edit(SchoolSubject $schoolSubject)
    {
        return view('backend.setup.school_subject.edit_school_subject', compact('schoolSubject'));
    }

    public function update(Request $request, SchoolSubject $schoolSubject)
    {
        $request->validate([
            'name' => 'required|unique:school_subjects,name,'.$schoolSubject->id
        ]);
        $schoolSubject->name = $request->name;
        $schoolSubject->save();

        $notification = [];
        $notification['message'] = 'Subject Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('school.subject.view')->with($notification);
    }

    public function destroy(SchoolSubject $schoolSubject)
    {
        $schoolSubject->delete();

        $notification = [];
        $notification['message'] = 'Subject Deleted Succesfully';
        $notification['alert_type'] = 'success';

        return back()->with($notification);
    }
}
