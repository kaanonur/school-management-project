<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    public function index()
    {
        $data['allData'] = EmployeeLeave::orderBy('id', 'desc')->get();

        return view('backend.employee.employee_leave.view', compact('data'));
    }

    public function create()
    {
        $data['employees'] = User::where('usertype', 'Employee')->get();
        $data['leave_purposes'] = LeavePurpose::all();

        return view('backend.employee.employee_leave.create', compact('data'));
    }

    public function store(Request $request)
    {
        if ($request->leave_purpose_id == 0) {
            $leavePurpose = new LeavePurpose();
            $leavePurpose->name = $request->new_purpose_name;
            $leavePurpose->save();
            $leavePurposeId = $leavePurpose->id;
        } else {
            $leavePurposeId = $request->leave_purpose_id;
        }

        EmployeeLeave::create([
            'employee_id' => $request->employee_id,
            'leave_purpose_id' => $leavePurposeId,
            'start_date' => date('Y-m-d', strtotime($request->start_date)),
            'end_date' => date('Y-m-d', strtotime($request->end_date))
        ]);

        $notification = [];
        $notification['message'] = 'Employee Leave Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('employee.leave.view')->with($notification);
    }

    public function edit(EmployeeLeave $employeeLeave)
    {
        $data['employees'] = User::where('usertype', 'Employee')->get();
        $data['leave_purposes'] = LeavePurpose::all();

        return view('backend.employee.employee_leave.edit', compact('data', 'employeeLeave'));
    }

    public function update(Request $request, EmployeeLeave $employeeLeave)
    {
        if ($request->leave_purpose_id == 0) {
            $leavePurpose = new LeavePurpose();
            $leavePurpose->name = $request->new_purpose_name;
            $leavePurpose->save();
            $leavePurposeId = $leavePurpose->id;
        } else {
            $leavePurposeId = $request->leave_purpose_id;
        }

        $employeeLeave->employee_id = $request->employee_id;
        $employeeLeave->leave_purpose_id = $leavePurposeId;
        $employeeLeave->start_date = date('Y-m-d', strtotime($request->start_date));
        $employeeLeave->end_date = date('Y-m-d', strtotime($request->end_date));
        $employeeLeave->save();

        $notification = [];
        $notification['message'] = 'Employee Leave Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('employee.leave.view')->with($notification);
    }

    public function destroy(EmployeeLeave $employeeLeave)
    {
        $employeeLeave->delete();

        $notification = [];
        $notification['message'] = 'Employee Leave Deleted Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('employee.leave.view')->with($notification);
    }
}
