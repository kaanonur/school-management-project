<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRegistration\StoreRequest;
use App\Http\Requests\EmployeeRegistration\UpdateRequest;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;

class EmployeeRegistrationController extends Controller
{
    public function index()
    {
        $data['allData'] = User::where('usertype', 'Employee')->get();

        return view('backend.employee.view', compact('data'));
    }

    public function create()
    {
        $data['designation'] = Designation::all();

        return view('backend.employee.create', compact('data'));
    }

    public function store(StoreRequest $request)
    {
        DB::transaction(function () use($request){
            $checkYearAndMonth = date('Ym', strtotime($request->join_date));
            $employee = User::where('usertype', 'Employee')->orderBy('id', 'desc')->first();

            if ($employee == null) {
                $firstReg = 0;
                $employeeId = $firstReg+1;

                if ($employeeId < 10) {
                    $idNo = '000'.$employeeId;
                } elseif($employeeId < 100) {
                    $idNo = '00'.$employeeId;
                } elseif($employeeId < 1000) {
                    $idNo = '0'.$employeeId;
                }
            } else {
                $employeeId = $employee->id+1;
                if ($employeeId < 10) {
                    $idNo = '000'.$employeeId;
                } elseif($employeeId < 100) {
                    $idNo = '00'.$employeeId;
                } elseif($employeeId < 1000) {
                    $idNo = '0'.$employeeId;
                }
            }

            $finalIdNo = $checkYearAndMonth.$idNo;
            $code = rand(0000,9999);

            $user = new User();
            $user->id_no = $finalIdNo;
            $user->password = Hash::make($code);
            $user->code = $code;
            $user->usertype = 'Employee';
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->join_date = date('Y-m-d', strtotime($request->join_date));
            if ($request->file('image')) {
                $file = $request->file('image');
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'), $fileName);
                $user->image = $fileName;
            }
            $user->save();

            $employeeSalary = new EmployeeSalaryLog();
            $employeeSalary->employee_id = $user->id;
            $employeeSalary->effected_salary = date('Y-m-d', strtotime($request->join_date));
            $employeeSalary->previous_salary = $request->salary;
            $employeeSalary->present_salary = $request->salary;
            $employeeSalary->increment_salary = 0;
            $employeeSalary->save();
        });

        $notification = [];
        $notification['message'] = 'Employee Registration Inserted Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('employee.registration.view')->with($notification);
    }

    public function edit(User $user)
    {
        $data['designation'] = Designation::all();

        return view('backend.employee.edit', compact('user', 'data'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->designation_id = $request->designation_id;
        $user->dob = date('Y-m-d', strtotime($request->dob));
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/employee_images/'. $user->image));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/employee_images'), $fileName);
            $user->image = $fileName;
        }
        $user->save();

        $notification = [];
        $notification['message'] = 'Employee Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('employee.registration.view')->with($notification);
    }

    public function destroy(User $user)
    {

    }
}
