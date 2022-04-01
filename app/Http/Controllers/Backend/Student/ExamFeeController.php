<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use PDF;

class ExamFeeController extends Controller
{
    public function index()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.student.exam_fee.view', compact('data'));
    }

    public function getExamFeeClassWise(Request $request)
    {
        $yearId = $request->year_id;
        $classId = $request->class_id;
        if ($yearId !='') {
            $where[] = ['year_id','like',$yearId.'%'];
        }
        if ($classId !='') {
            $where[] = ['class_id','like',$classId.'%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();

        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Exam Fee</th>';
        $html['thsource'] .= '<th>Discount </th>';
        $html['thsource'] .= '<th>Student Fee </th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($allStudent as $key => $v) {
            $examFee = FeeCategoryAmount::where('fee_category_id', 3)->where('class_id',$v->class_id)->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$examFee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';

            $originalFee = $examFee->amount;
            $discount = $v['discount']['discount'];
            $discountTableFee = $discount / 100 * $originalFee;
            $finalFee = (float)$originalFee-(float)$discountTableFee;

            $html[$key]['tdsource'] .='<td>'.$finalFee.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route('student.exam.fee.paySlip').'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&exam_type_id='.$request->exam_type_id.'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }
        return response()->json(@$html);
    }

    public function paySlip(Request $request)
    {
        $studentId = $request->student_id;
        $classId = $request->class_id;
        $data['exam_type'] = ExamType::where('id', $request->exam_type_id)->first()->name;

        $data['details'] = AssignStudent::with(['student','discount'])->where('student_id',$studentId)->where('class_id',$classId)->first();

        $pdf = PDF::loadView('backend.student.exam_fee.exam_fee_pdf', compact('data'));
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
