<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function index()
    {
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')
            ->groupBy('fee_category_id')
            ->with('feeCategory')
            ->get();

        return view('backend.setup.fee_amount.view_fee_amount', compact('data'));
    }

    public function create()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.fee_amount.add_fee_amount', compact('data'));
    }

    public function store(Request $request)
    {
        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                FeeCategoryAmount::create([
                    'fee_category_id' => $request->fee_category_id,
                    'class_id' => $request->class_id[$i],
                    'amount' => $request->amount[$i],
                ]);
            }
        }

        $notification = [];
        $notification['message'] = 'Fee Amount Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('fee.amount.view')->with($notification);
    }

    public function edit(FeeCategory $feeCategory)
    {
        $data['editData'] = FeeCategoryAmount::where('fee_category_id', $feeCategory->id)->orderBy('class_id', 'asc')->get();
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.fee_amount.edit_fee_amount', compact('data'));
    }

    public function update(Request $request, FeeCategory $feeCategory)
    {
        if ($request->class_id == NULL) {
            $notification = [];
            $notification['message'] = "Sorry, You don't select any class amount";
            $notification['alert_type'] = 'error';

            return redirect()->route('fee.amount.edit', $feeCategory->id)->with($notification);
        } else {
            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id', $feeCategory->id)->delete();

            for ($i = 0; $i < $countClass; $i++) {
                FeeCategoryAmount::create([
                    'fee_category_id' => $request->fee_category_id,
                    'class_id' => $request->class_id[$i],
                    'amount' => $request->amount[$i],
                ]);
            }

            $notification['message'] = "Fee Amount succesfully updated";
            $notification['alert_type'] = 'success';

            return redirect()->route('fee.amount.view')->with($notification);
        }
    }

    public function show(FeeCategory $feeCategory)
    {
        $data['detailsData'] = FeeCategoryAmount::where('fee_category_id', $feeCategory->id)->orderBy('class_id', 'asc')->with('studentClass')->get();

        return view('backend.setup.fee_amount.details_fee_amount', compact('data'));
    }
}
