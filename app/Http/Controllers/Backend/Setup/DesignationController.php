<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $data['allData'] = Designation::all();

        return view('backend.setup.designation.view_designation', compact('data'));
    }

    public function create()
    {
        return view('backend.setup.designation.add_designation');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:designations,name'
        ]);

        Designation::create(['name' => $request->name]);

        $notification = [];
        $notification['message'] = 'Designation Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('designation.view')->with($notification);
    }

    public function edit(Designation $designation)
    {
        return view('backend.setup.designation.edit_designation', compact('designation'));
    }

    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'name' => 'required|unique:designations,name,'.$designation->id
        ]);
        $designation->name = $request->name;
        $designation->save();

        $notification = [];
        $notification['message'] = 'Designation Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('designation.view')->with($notification);
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();

        $notification = [];
        $notification['message'] = 'Designation Deleted Succesfully';
        $notification['alert_type'] = 'success';

        return back()->with($notification);
    }
}
