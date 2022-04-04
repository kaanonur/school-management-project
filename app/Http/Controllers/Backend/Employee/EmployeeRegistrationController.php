<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        dd($request->all());
    }
}
