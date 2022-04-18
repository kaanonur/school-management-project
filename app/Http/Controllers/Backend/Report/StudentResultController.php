<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use PDF;

class StudentResultController extends Controller
{
    public function index()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.report.student_result.view', compact('data'));
    }

    public function getStudentResults(Request $request)
    {
        $yearId = $request->year_id;
        $classId = $request->class_id;
        $examTypeId = $request->exam_type_id;

        $check = StudentMarks::where([
            'year_id' => $yearId,
            'class_id' => $classId,
            'exam_type_id' => $examTypeId,
        ])->first();

        if ($check) {
            $data['allData'] = StudentMarks::select('year_id','class_id','exam_type_id','student_id')
                ->where([
                    'year_id' => $yearId,
                    'class_id' => $classId,
                    'exam_type_id' => $examTypeId,
                ])
                ->groupBy('year_id')
                ->groupBy('class_id')
                ->groupBy('exam_type_id')
                ->groupBy('student_id')
                ->get();

            $pdf = PDF::loadView('backend.report.student_result.pdf', compact('data'));
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');
        } else {
            $notification = [];
            $notification['message'] = 'Sorry These Criteria donse not match';
            $notification['alert_type'] = 'error';

            return redirect()->back()->with($notification);
        }
    }

    public function idCardView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('backend.report.id_card.view', compact('data'));
    }

    public function getIdCard(Request $request)
    {
        $yearId = $request->year_id;
        $classId = $request->class_id;

        $checkData = AssignStudent::where('year_id',$yearId)->where('class_id',$classId)->first();

        if ($checkData) {
            $data['allData'] = AssignStudent::where('year_id',$yearId)->where('class_id',$classId)->get();

            $pdf = PDF::loadView('backend.report.id_card.pdf', compact('data'));
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');
        } else {
            $notification = [];
            $notification['message'] = 'Sorry These Criteria donse not match';
            $notification['alert_type'] = 'error';

            return redirect()->back()->with($notification);
        }
    }
}
