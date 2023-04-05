<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Senf;
use App\Models\Payment;
use App\Models\Student;
use App\Models\SenfStudent;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.reports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $faculties = Faculty::all();

       return view('admin.reports.create', compact('faculties', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        // return $department = $request->department;
        $faculty = $request->faculty;
        $needed_payment = $request->payment;
        $payments;
        if( $to != null && $faculty != null && $needed_payment != null){

            $departments = Faculty::findorfail($faculty)->departments->pluck('id');
            $senfs = Senf::whereIn('department_id', $departments)->pluck('id');
            $students = SenfStudent::whereIn('senf_id', $senfs)->pluck('student_id');

            $payments = Payment::whereBetween('paid_at', [$from, $to])->whereIn('student_id', $students)->where('needed_payment', $needed_payment)->where('paid_amount','!=', null)->get();
        }
        elseif($to != null && $faculty != null){
            $departments = Faculty::findorfail($faculty)->departments->pluck('id');
            $senfs = Senf::whereIn('department_id', $departments)->pluck('id');
            $students = SenfStudent::whereIn('senf_id', $senfs)->pluck('student_id');
            $payments = Payment::whereBetween('paid_at', [$from, $to])->whereIn('student_id', $students)->where('paid_amount','!=', null)->get();

        }
        elseif($needed_payment != null && $faculty != null){
            $departments = Faculty::findorfail($faculty)->departments->pluck('id');
            $senfs = Senf::whereIn('department_id', $departments)->pluck('id');
            $students = SenfStudent::whereIn('senf_id', $senfs)->pluck('student_id');
            $payments = Payment::whereBetween('paid_at', [$from, $to])->whereIn('student_id', $students)->where('paid_amount','!=', null)->get();

        }
        elseif($to != null && $needed_payment != null){
            $payments = Payment::whereDate('created_at', '<=', $from)->where('needed_payment', $needed_payment)->where('paid_amount','!=', null)->get();

        }
        else{
            $payments = Payment::whereDate('created_at', '>=', $from)->where('paid_amount','!=', null)->get();
        }
       return view('admin.reports.index', compact('payments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show( $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit( $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy( $bill)
    {
        //
    }
}
