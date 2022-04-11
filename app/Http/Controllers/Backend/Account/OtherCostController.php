<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherCost\StoreRequest;
use App\Http\Requests\OtherCost\UpdateRequest;
use App\Models\AccountOtherCost;
use Illuminate\Http\Request;

class OtherCostController extends Controller
{
    public function index()
    {
        $data['allData'] = AccountOtherCost::orderBy('id', 'desc')->get();

        return view('backend.account.other_cost.view', compact('data'));
    }

    public function create()
    {
        return view('backend.account.other_cost.create');
    }

    public function store(StoreRequest $request)
    {
        $cost = new AccountOtherCost();
        $cost->date = $request->date;
        $cost->amount = $request->amount;
        $cost->description = $request->description;

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'), $fileName);
            $cost->image = $fileName;
        }
        $cost->save();

        $notification = [];
        $notification['message'] = 'Cost Added Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('other.cost.view')->with($notification);
    }

    public function edit(AccountOtherCost $accountOtherCost)
    {
        return view('backend.account.other_cost.edit', compact('accountOtherCost'));
    }

    public function update(UpdateRequest $request, AccountOtherCost $accountOtherCost)
    {
        $accountOtherCost->date = $request->date;
        $accountOtherCost->amount = $request->amount;
        $accountOtherCost->description = $request->description;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/cost_images/'.$accountOtherCost->image));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'), $fileName);
            $accountOtherCost->image = $fileName;
        }
        $accountOtherCost->save();

        $notification = [];
        $notification['message'] = 'Cost Updated Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('other.cost.view')->with($notification);
    }

    public function destroy(AccountOtherCost $accountOtherCost)
    {
        $accountOtherCost->delete();

        @unlink(public_path('upload/cost_images/'.$accountOtherCost->image));

        $notification = [];
        $notification['message'] = 'Cost Deleted Succesfully';
        $notification['alert_type'] = 'success';

        return redirect()->route('other.cost.view')->with($notification);
    }
}
