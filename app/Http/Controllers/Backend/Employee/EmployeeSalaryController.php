<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeSalaryLog;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    public function index()
    {
        $data['allData'] = User::where('usertype', 'Employee')->get();

        return view('backend.employee.employee_salary.view', compact('data'));
    }

    public function create()
    {

    }

    public function show(User $user)
    {
        return view('backend.employee.employee_salary.detail', compact('user'));
    }

    public function increment(User $user)
    {
        return view('backend.employee.employee_salary.increment', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $previousSalary = $user->salary;
        $presentSalary = (float) $previousSalary + (float) $request->increment_salary;
        $user->salary = $presentSalary;
        $user->save();

        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $user->id;
        $salaryData->previous_salary = $previousSalary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $presentSalary;
        $salaryData->effected_salary = date('Y-m-d', strtotime($request->affected_salary));
        $salaryData->save();

        $notification = [];
        $notification['message'] = 'Employee Salary Increment Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('employee.salary.view')->with($notification);
    }
}
