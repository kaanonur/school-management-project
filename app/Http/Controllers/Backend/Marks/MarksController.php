<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMarks;
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

    public function store(Request $request)
    {
        $studentCount = count($request->student_id);

        if ($studentCount) {
            for ($i=0; $i < $studentCount; $i++) {
                $studentMark = new StudentMarks();
                $studentMark->year_id = $request->year_id;
                $studentMark->class_id = $request->class_id;
                $studentMark->assign_subject_id = $request->assign_subject_id;
                $studentMark->exam_type_id = $request->exam_type_id;
                $studentMark->student_id = $request->student_id[$i];
                $studentMark->id_no = $request->id_no[$i];
                $studentMark->marks = $request->marks[$i];
                $studentMark->save();
            }
        }

        $notification = [];
        $notification['message'] = 'Student Marks Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->back()->with($notification);
    }

    public function edit()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.marks.edit', compact('data'));
    }

    public function update(Request $request)
    {
        StudentMarks::where(['year_id' => $request->year_id,
            'class_id' => $request->class_id,
            'exam_type_id' => $request->exam_type_id,
            'assign_subject_id' => $request->assign_subject_id])->delete();

        $studentCount = count($request->student_id);

        if ($studentCount) {
            for ($i=0; $i < $studentCount; $i++) {
                $studentMark = new StudentMarks();
                $studentMark->year_id = $request->year_id;
                $studentMark->class_id = $request->class_id;
                $studentMark->assign_subject_id = $request->assign_subject_id;
                $studentMark->exam_type_id = $request->exam_type_id;
                $studentMark->student_id = $request->student_id[$i];
                $studentMark->id_no = $request->id_no[$i];
                $studentMark->marks = $request->marks[$i];
                $studentMark->save();
            }
        }

        $notification = [];
        $notification['message'] = 'Student Marks Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->back()->with($notification);
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

    public function getStudentsWithMarks(Request $request)
    {
        $yearId = $request->year_id;
        $classId = $request->class_id;
        $assignSubjectId = $request->assign_subject_id;
        $examTypeId = $request->exam_type_id;

        $getStudent = StudentMarks::with(['student'])->where([
                'year_id' => $yearId,
                'class_id' => $classId,
                'exam_type_id' => $examTypeId,
                'assign_subject_id' => $assignSubjectId])->get();

        return response()->json($getStudent);
    }
}
