<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    public function create()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.marks.create', compact('data'));
    }

    public function getSubjects(Request $request)
    {
        $classId = $request->class_id;
        $allData = AssignSubject::with(['schoolSubject'])->where('class_id', $classId)->get();

        return response()->json($allData);
    }

    public function getStudents(Request $request){
        $yearId = $request->year_id;
        $classId = $request->class_id;
        $allData = AssignStudent::with(['student'])->where('year_id',$yearId)->where('class_id',$classId)->get();

        return response()->json($allData);

    }
}
