<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function index()
    {
        $data['allData'] = AssignSubject::select('class_id')
            ->groupBy('class_id')
            ->with('studentClass')
            ->orderBy('class_id', 'asc')
            ->get();

        return view('backend.setup.assign_subject.view_assign_subject', compact('data'));
    }

    public function create()
    {
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.assign_subject.add_assign_subject', compact('data'));
    }

    public function store(Request $request)
    {
        $countSubject = count($request->subject_id);
        if ($countSubject != NULL) {
            for ($i = 0; $i < $countSubject; $i++) {
                AssignSubject::create([
                    'class_id' => $request->class_id,
                    'subject_id' => $request->subject_id[$i],
                    'full_mark' => $request->full_mark[$i],
                    'pass_mark' => $request->pass_mark[$i],
                    'subjective_mark' => $request->subjective_mark[$i],
                ]);
            }
        }

        $notification = [];
        $notification['message'] = 'Subject Assign Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('assign.subject.view')->with($notification);
    }

    public function edit(StudentClass $studentClass)
    {
        $data['editData'] = AssignSubject::where('class_id', $studentClass->id)->orderBy('subject_id', 'asc')->get();
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.assign_subject.edit_assign_subject', compact('data'));
    }

    public function update(Request $request, StudentClass $studentClass)
    {
        if ($request->subject_id == NULL) {
            $notification = [];
            $notification['message'] = "Sorry, You don't select any subject";
            $notification['alert_type'] = 'error';

            return redirect()->route('assign.subject.edit', $studentClass->id)->with($notification);
        } else {
            $countClass = count($request->subject_id);
            AssignSubject::where('class_id', $studentClass->id)->delete();

            for ($i = 0; $i < $countClass; $i++) {
                AssignSubject::create([
                    'class_id' => $request->class_id,
                    'subject_id' => $request->subject_id[$i],
                    'full_mark' => $request->full_mark[$i],
                    'pass_mark' => $request->pass_mark[$i],
                    'subjective_mark' => $request->subjective_mark[$i],
                ]);
            }

            $notification['message'] = "Assign subject succesfully updated";
            $notification['alert_type'] = 'success';

            return redirect()->route('assign.subject.view')->with($notification);
        }
    }

    public function show(StudentClass $studentClass)
    {
        $data['detailsData'] = AssignSubject::where('class_id', $studentClass->id)->orderBy('class_id', 'asc')->with('studentClass')->get();

        return view('backend.setup.assign_subject.details_assign_subject', compact('data'));
    }
}
