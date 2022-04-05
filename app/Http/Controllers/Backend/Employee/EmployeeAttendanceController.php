<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    public function index()
    {
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->get();
//        $data['allData'] = EmployeeAttendance::orderBy('id', 'desc')->get();

        return view('backend.employee.employee_attendance.view', compact('data'));
    }

    public function create()
    {
        $data['employees'] = User::where('usertype', 'Employee')->get();

        return view('backend.employee.employee_attendance.create', compact('data'));
    }

    public function store(Request $request)
    {
        EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();

        $countEmployee = count($request->employee_id);
        for ($i=0; $i < $countEmployee; $i++) {
            $attendStatus = 'attend_status_'.$i;
            EmployeeAttendance::create([
                'date' => date('Y-m-d', strtotime($request->date)),
                'employee_id' => $request->employee_id[$i],
                'attend_status' => $request->$attendStatus
            ]);
        }

        $notification = [];
        $notification['message'] = 'Employee Attendance Data Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('employee.attendance.view')->with($notification);
    }

    public function edit($date)
    {
        $data['editData'] = EmployeeAttendance::where('date', $date)->get();
//        $data['employees'] = User::where('usertype', 'Employee')->get();

        return view('backend.employee.employee_attendance.edit', compact('data'));
    }

    public function show($date)
    {
        $data['details'] = EmployeeAttendance::where('date', $date)->get();

        return view('backend.employee.employee_attendance.detail', compact('data'));
    }
}
