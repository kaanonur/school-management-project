<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountEmployeeSalary;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    public function index()
    {
        $data['allData'] = AccountEmployeeSalary::all();

        return view('backend.account.employee_salary.view', compact('data'));
    }

    public function create()
    {
        return view('backend.account.employee_salary.create');
    }

    public function store(Request $request)
    {
        $date = date('Y-m-d',strtotime($request->date));

        AccountEmployeeSalary::where('date', $date)->delete();

        $checkData = count($request->check_manage);

        if ($checkData != null) {
            for ($i = 0; $i < $checkData; $i++) {
                $accountEmployeeSalary = new AccountEmployeeSalary();
                $accountEmployeeSalary->date = $date;
                $accountEmployeeSalary->employee_id = $request->employee_id[$request->check_manage[$i]];
                $accountEmployeeSalary->amount = $request->amount[$request->check_manage[$i]];
                $accountEmployeeSalary->save();
            }
        }

        if (!empty(@$accountEmployeeSalary) || empty($checkData)) {
            $notification = [];
            $notification['message'] = 'Updated Succesfully';
            $notification['alert_type'] = 'success';

            return redirect()->route('account.salary.view')->with($notification);
        } else {
            $notification = [];
            $notification['message'] = 'Something Went Wrong';
            $notification['alert_type'] = 'error';

            return redirect()->back()->with($notification);
        }
    }

    public function getEmployees(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }
        $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();

        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary This Month</th>';
        $html['thsource'] .= '<th>Select</th>';


        foreach ($data as $key => $v) {

            $accountSalary = AccountEmployeeSalary::where('employee_id', $v->employee_id)
                ->whereMonth('date', $date)->first();

            if($accountSalary != null) {
                $checked = 'checked';
            }else{
                $checked = '';
            }

            $totalAttend = EmployeeAttendance::with(['user'])
                ->where($where)
                ->where('employee_id', $v->employee_id)
                ->get();
            $absentCount = count($totalAttend->where('attend_status', '==', 'Absent'));

            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['user']['id_no'].'<input type="hidden" name="date" value="'.$date.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['user']['salary'].'</td>';

            $salary = (float) $v['user']['salary'];
            $salaryPerDay = (float) $v['user']['salary'] / 30;
            $totalSalaryMinus = (float) $absentCount * (float) $salaryPerDay;
            $totalSalary = $salary - $totalSalaryMinus;

            $html[$key]['tdsource'] .='<td>'.$totalSalary.'<input type="hidden" name="amount[]" value="'.$totalSalary.'">'.'</td>';
            $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="employee_id[]" value="'.$v->employee_id.'">'.'<input type="checkbox" name="check_manage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>';

        }
        return response()->json(@$html);
    }
}
