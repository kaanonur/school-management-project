<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class AttendanceReportController extends Controller
{
    public function index()
    {
        $data['employees'] = User::where('usertype', 'Employee')->get();

        return view('backend.report.attendance_report.view', compact('data'));
    }

    public function getAttendanceReports(Request $request)
    {
        $employeeId = $request->employee_id;
        $month = $request->date;
        if ($employeeId != '') {
            $where[] = ['employee_id', $employeeId];
        }
        if ($month != '') {
            $where[] = ['date', 'like', $month.'%'];
        }

        $attendance = EmployeeAttendance::with(['user'])->where($where)->get();

        if ($attendance) {
            $data['allData'] = $attendance;

            $data['absents'] = EmployeeAttendance::with(['user'])->where('attend_status', '=', 'Absent')->where($where)->count();
            $data['leaves'] = EmployeeAttendance::with(['user'])->where('attend_status', '=', 'Leave')->where($where)->count();

            $data['month'] = date('m-Y', strtotime($month));

            $pdf = PDF::loadView('backend.report.attendance_report.pdf', compact('data'));
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
