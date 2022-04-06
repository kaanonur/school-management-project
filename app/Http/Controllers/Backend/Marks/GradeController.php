<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Marks\Grade\StoreRequest;
use App\Http\Requests\Marks\Grade\UpdateRequest;
use App\Models\MarksGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $data['allData'] = MarksGrade::all();

        return view('backend.marks.grade.view', compact('data'));
    }

    public function create()
    {
        return view('backend.marks.grade.create');
    }

    public function store(StoreRequest $request)
    {
        MarksGrade::create([
            'grade_name' => $request->grade_name,
            'grade_point' => $request->grade_point,
            'start_marks' => $request->start_marks,
            'end_marks' => $request->end_marks,
            'start_point' => $request->start_point,
            'end_point' => $request->end_point,
            'remarks' => $request->remarks,
        ]);

        $notification = [];
        $notification['message'] = 'Grade Marks Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('marks.grade.view')->with($notification);
    }

    public function edit(MarksGrade $marksGrade)
    {
        return view('backend.marks.grade.edit', compact('marksGrade'));
    }

    public function update(UpdateRequest $request, MarksGrade $marksGrade)
    {
        $marksGrade->grade_name = $request->grade_name;
        $marksGrade->grade_point = $request->grade_point;
        $marksGrade->start_marks = $request->start_marks;
        $marksGrade->end_marks = $request->end_marks;
        $marksGrade->start_point = $request->start_point;
        $marksGrade->end_point = $request->end_point;
        $marksGrade->remarks = $request->remarks;
        $marksGrade->save();

        $notification = [];
        $notification['message'] = 'Grade Marks Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('marks.grade.view')->with($notification);
    }
}
