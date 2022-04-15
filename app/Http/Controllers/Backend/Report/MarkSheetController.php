<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\MarksGrade;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarkSheetController extends Controller
{
    public function index()
    {
        $data['years'] = StudentYear::orderBy('id', 'desc')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.report.marksheet.view', compact('data'));
    }

    public function getMarkSheet(Request $request)
    {
        $yearId = $request->year_id;
        $classId = $request->class_id;
        $examTypeId = $request->exam_type_id;
        $idNo = $request->id_no;

        $countFail = StudentMarks::where('year_id', $yearId)
            ->where('class_id', $classId)
            ->where('exam_type_id', $examTypeId)
            ->where('id_no', $idNo)
            ->where('marks', '<', '33')->get()->count();
        $singleStudent = StudentMarks::where('year_id', $yearId)
            ->where('class_id', $classId)
            ->where('exam_type_id', $examTypeId)
            ->where('id_no', $idNo)->first();
        if ($singleStudent) {
            $allMarks = StudentMarks::with(['assignSubject', 'year'])->where('year_id', $yearId)
                ->where('class_id', $classId)
                ->where('exam_type_id', $examTypeId)
                ->where('id_no', $idNo)->get();

            $allGrades = MarksGrade::all();

            return view('backend.report.marksheet.pdf', compact('allMarks', 'allGrades', 'countFail'));
        } else {
            $notification = [];
            $notification['message'] = 'Sorry These Criteria donse not match';
            $notification['alert_type'] = 'error';

            return redirect()->back()->with($notification);
        }
    }
}
