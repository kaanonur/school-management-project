<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\AccountEmployeeSalary;
use App\Models\AccountOtherCost;
use App\Models\AccountStudentFee;
use Illuminate\Http\Request;
use PDF;

class ProfitController extends Controller
{
    public function index()
    {
        return view('backend.report.profit.view');
    }

    public function getProfitDateWais(Request $request)
    {
        $startDate = date('Y-m', strtotime($request->start_date));
        $endDate = date('Y-m', strtotime($request->end_date));
        $sDate = date('Y-m-d', strtotime($request->start_date));
        $eDate = date('Y-m-d', strtotime($request->end_date));

        $studentFee = AccountStudentFee::whereBetween('date', [$startDate, $endDate])->sum('amount');
        $otherCost = AccountOtherCost::whereBetween('date', [$sDate, $eDate])->sum('amount');
        $employeeSalary = AccountEmployeeSalary::whereBetween('date', [$startDate, $endDate])->sum('amount');

        $totalCost = $otherCost + $employeeSalary;
        $profit = $studentFee - $totalCost;

        $html['thsource']  = '<th>Student Fee</th>';
        $html['thsource'] .= '<th>Other Cost</th>';
        $html['thsource'] .= '<th>Employee Salary</th>';
        $html['thsource'] .= '<th>Total Cost</th>';
        $html['thsource'] .= '<th>Profit</th>';
        $html['thsource'] .= '<th>Action</th>';

        $color = 'success';
        $html['tdsource']  = '<td>'.$studentFee.'</td>';
        $html['tdsource']  .= '<td>'.$otherCost.'</td>';
        $html['tdsource']  .= '<td>'.$employeeSalary.'</td>';
        $html['tdsource']  .= '<td>'.$totalCost.'</td>';
        $html['tdsource']  .= '<td>'.$profit.'</td>';
        $html['tdsource'] .='<td>';
        $html['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PDF" target="_blanks" href="'.route('report.profit.pdf').'?start_date='.$sDate.'&end_date='.$eDate.'">Pay Slip</a>';
        $html['tdsource'] .= '</td>';
        return response()->json(@$html);
    }

    public function profitPdf(Request $request)
    {
        $data['startDate'] = date('Y-m', strtotime($request->start_date));
        $data['endDate'] = date('Y-m', strtotime($request->end_date));
        $data['sDate'] = date('Y-m-d', strtotime($request->start_date));
        $data['eDate'] = date('Y-m-d', strtotime($request->end_date));

        $pdf = PDF::loadView('backend.report.profit.pdf', compact('data'));
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
