<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function index()
    {
        $data['allData'] = FeeCategory::all();

        return view('backend.setup.fee_category.view_fee_category', compact('data'));
    }

    public function create()
    {
        return view('backend.setup.fee_category.add_fee_category');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:fee_categories,name'
        ]);

        FeeCategory::create(['name' => $request->name]);

        $notification = [];
        $notification['message'] = 'Student Fee Category Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('fee.category.view')->with($notification);
    }

    public function edit(FeeCategory $feeCategory)
    {
        return view('backend.setup.fee_category.edit_fee_category', compact('feeCategory'));
    }


    public function update(Request $request, FeeCategory $feeCategory)
    {
        $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$feeCategory->id
        ]);
        $feeCategory->name = $request->name;
        $feeCategory->save();

        $notification = [];
        $notification['message'] = 'Student Fee Category Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('fee.category.view')->with($notification);
    }

    public function destroy(FeeCategory $feeCategory)
    {
        $feeCategory->delete();

        $notification = [];
        $notification['message'] = 'Student Fee Category Deleted Succesfully';
        $notification['alert_type'] = 'success';

        return back()->with($notification);
    }
}
