<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class MonthlySalaryController extends Controller
{
    public function index()
    {
        return view('backend.employee.monthly_salary.view');
    }

    public function monthlySalaryGet(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }
        $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();

        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary This Month</th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($data as $key => $v) {
            $totalAttend = EmployeeAttendance::with(['user'])
                ->where($where)
                ->where('employee_id', $v->employee_id)
                ->get();
            $absentCount = count($totalAttend->where('attend_status', '==', 'Absent'));
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['user']['salary'].'</td>';

            $salary = (float) $v['user']['salary'];
            $salaryPerDay = (float) $v['user']['salary'] / 30;
            $totalSalaryMinus = (float) $absentCount * (float) $salaryPerDay;
            $totalSalary = $salary - $totalSalaryMinus;

            $html[$key]['tdsource'] .='<td>'.$totalSalary.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route('employee.monthly.salary.paySlip', $v->employee_id).'">Pay Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }
        return response()->json(@$html);
    }

    public function paySlip(Request $request,User $user)
    {
        $id = EmployeeAttendance::where('employee_id', $user->id)->first();
        $date = date('Y-m', strtotime($id->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }

        $data['details'] = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$user->id)->get();

        $pdf = PDF::loadView('backend.employee.monthly_salary.pdf', compact('data'));
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
