<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use App\Mail\SumaryReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ExpenseReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return ExpenseReport::all();
        return view('expenseReport.index',[
            'expenseReports'=>ExpenseReport::all()
        ]);
    }
    /** CPANEL
     * user: power
     * pass: 0rgp3ru#UP
     * 
     * uxsite
     * WkVzmM!~+7sZ
     * */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseReport.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validData= $request->validate([
            'title'=>'required|min:3'
        ]);

        //dd($validData);

        $report = new ExpenseReport();
        $report->title = $validData['title'];
        $report->save();

        return redirect('/expense_reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  ExpenseReport $report
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseReport $expenseReport)
    {
        //$report=ExpenseReport::findOrFail($id);
        //Laravel hace el findOrFail directamente
        return view('expenseReport.show',[
            'report'=>$expenseReport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$report=ExpenseReport::find($id);
         // findOrFail si no encuentra el id revuelve error 404
        $report=ExpenseReport::findOrFail($id);
        return view('expenseReport.edit',[
            'report'=>$report
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report=ExpenseReport::findOrFail($id);
        $report->title=$request->get('title');
        $report->save();

        return redirect('/expense_reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report=ExpenseReport::findOrFail($id);
        $report->delete();

        return redirect('/expense_reports');
    }

    public function confirmDelete($id)
    {
        $report=ExpenseReport::findOrFail($id);
        return view('expenseReport.confirmDelete',[
            'report'=>$report
        ]);
    }

    public function confirmSendMail($id)
    {
        $report=ExpenseReport::findOrFail($id);
        return view('expenseReport.confirmSendMail',[
            'report'=>$report
        ]);
    }

    public function SendMail(Request $request, $id)
    {
        $report=ExpenseReport::findOrFail($id);
        Mail::to($request->get('email'))->send(new SumaryReport($report));
        return redirect('/expense_reports/'.$id);
    }

}
