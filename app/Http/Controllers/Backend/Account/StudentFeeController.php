<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountStudentFee;
use App\Models\AssignStudent;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    public function index()
    {
        $data['allData'] = AccountStudentFee::all();

        return view('backend.account.student_fee.view', compact('data'));
    }

    public function create()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['feeCategories'] = FeeCategory::all();

        return view('backend.account.student_fee.create', compact('data'));
    }

    public function store(Request $request)
    {
        $date = date('Y-m',strtotime($request->date));

        AccountStudentFee::where([
            'year_id' => $request->year_id,
            'class_id' => $request->class_id,
            'fee_category_id' => $request->fee_category_id,
            'date' => $date,
        ])->delete();

        $checkData = $request->check_manage;

        if ($checkData != null) {
            for ($i = 0; $i < count($checkData); $i++) {
                $accountStudentFee = new AccountStudentFee();
                $accountStudentFee->year_id = $request->year_id;
                $accountStudentFee->class_id = $request->class_id;
                $accountStudentFee->fee_category_id = $request->fee_category_id;
                $accountStudentFee->date = $date;
                $accountStudentFee->student_id = $request->student_id[$checkData[$i]];
                $accountStudentFee->amount = $request->amount[$checkData[$i]];
                $accountStudentFee->save();
            }
        }

        if (!empty(@$accountStudentFee) || empty($checkData)) {
            $notification = [];
            $notification['message'] = 'Updated Succesfully';
            $notification['alert_type'] = 'success';

            return redirect()->route('student.fee.view')->with($notification);
        } else {
            $notification = [];
            $notification['message'] = 'Something Went Wrong';
            $notification['alert_type'] = 'error';

            return redirect()->back()->with($notification);
        }
    }

    public function getStudents(Request $request)
    {
        $yearId = $request->year_id;
        $classId = $request->class_id;
        $feeCategoryId = $request->fee_category_id;
        $date = date('Y-m',strtotime($request->date));

        $data = AssignStudent::with(['discount'])->where('year_id', $yearId)->where('class_id', $classId)->get();

        $html['thsource']  = '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Father Name</th>';
        $html['thsource'] .= '<th>Original Fee </th>';
        $html['thsource'] .= '<th>Discount Amount</th>';
        $html['thsource'] .= '<th>Fee (This Student)</th>';
        $html['thsource'] .= '<th>Select</th>';

        foreach ($data as $key => $student) {
            $registrationFee = FeeCategoryAmount::where('fee_category_id', $feeCategoryId)->where('class_id', $student->class_id)->first();

            $accountStudentFees = AccountStudentFee::where('student_id',$student->student_id)
                ->where('year_id',$student->year_id)
                ->where('class_id',$student->class_id)
                ->where('fee_category_id',$feeCategoryId)
                ->whereMonth('date',$date)->first();
            if($accountStudentFees != null) {
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.$student['student']['id_no']. '<input type="hidden" name="fee_category_id" value= " '.$feeCategoryId.' " >'.'</td>';

            $html[$key]['tdsource']  .= '<td>'.$student['student']['name']. '<input type="hidden" name="year_id" value= " '.$student->year_id.' " >'.'</td>';

            $html[$key]['tdsource']  .= '<td>'.$student['student']['fname']. '<input type="hidden" name="class_id" value= " '.$student->class_id.' " >'.'</td>';

            $html[$key]['tdsource']  .= '<td>'.$registrationFee->amount.'$'.'<input type="hidden" name="date" value= " '.$date.' " >'.'</td>';

            $html[$key]['tdsource'] .= '<td>'.$student['discount']['discount'].'%'.'</td>';

            $orginalFee = $registrationFee->amount;
            $discount = $student['discount']['discount'];
            $discounTableFee = $discount/100*$orginalFee;
            $finalFee = (int)$orginalFee-(int)$discounTableFee;

            $html[$key]['tdsource'] .='<td>'. '<input type="text" name="amount[]" value="'.$finalFee.' " class="form-control" readonly'.'</td>';

            $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="student_id[]" value="'.$student->student_id.'">'.'<input type="checkbox" name="check_manage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>';

        }
        return response()->json(@$html);
    }
}
