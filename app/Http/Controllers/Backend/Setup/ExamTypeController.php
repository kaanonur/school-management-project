<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function index()
    {
        $data['allData'] = ExamType::all();

        return view('backend.setup.exam_type.view_exam_type', compact('data'));
    }

    public function create()
    {
        return view('backend.setup.exam_type.add_exam_type');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:exam_types,name'
        ]);

        ExamType::create(['name' => $request->name]);

        $notification = [];
        $notification['message'] = 'Exam Type Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('exam.type.view')->with($notification);
    }

    public function edit(ExamType $examType)
    {
        return view('backend.setup.exam_type.edit_exam_type', compact('examType'));
    }

    public function update(Request $request, ExamType $examType)
    {
        $request->validate([
            'name' => 'required|unique:exam_types,name,'.$examType->id
        ]);
        $examType->name = $request->name;
        $examType->save();

        $notification = [];
        $notification['message'] = 'Exam Type Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('exam.type.view')->with($notification);
    }

    public function destroy(ExamType $examType)
    {
        $examType->delete();

        $notification = [];
        $notification['message'] = 'Exam Type Deleted Succesfully';
        $notification['alert_type'] = 'success';

        return back()->with($notification);
    }
}
